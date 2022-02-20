<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Service;
use App\Models\State;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customers = User::with(['address.get_country', 'orders'])->latest()->get();
        return view('admin.pages.customer.customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::all();
        return view('admin.pages.customer.add-customer', compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|unique:users',
            'phone' => 'required|max:255|unique:users',
            'password' => 'required|max:16|min:6',
            'confirmPassword' => 'required|max:16|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address1' => 'required',
            'zipCode' => 'required',
            'avatar' =>'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $user                       = new User();
        $user->name                 = $request->firstName.' '.$request->lastName;
        $user->email                = $request->email;
        $user->phone                = $request->phone;
        $user->password             = Hash::make($request->password);
        $user->profile_photo_path   = $request->hasFile('avatar') ? $this->upload_image($request->file('avatar')) : null;
        $user->save();

        if (isset($user)) {
            $address                        = new Address();
            $address->customer_id           = $user->id;
            $address->address_line_1        = $request->address1;
            $address->address_line_2        = $request->address2;
            $address->city                  = $request->city;
            $address->state                 = $request->state;
            $address->zip_code              = $request->zipCode;
            $address->country               = $request->country;
            $address->is_primary            = true;
            $address->save();
        }

        return Redirect::route('customers.create')->with('success', 'Customer was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $customer = User::find($id);
        $address = Address::with(['get_state', 'get_country'])->where('user_id', $customer->id)->first();
        $countries = Country::all();
        $states = State::all();
        return view('admin.pages.customer.edit-customer', compact('customer', 'address', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (isset($request->address)) {
            $request->validate([
                'country' => 'required',
                'city' => 'required',
                'state' => 'required',
                'address_1' => 'required',
                'zip_code' => 'required',
            ]);
            $address                        = Address::find($request->address);
            $address->address_line_1        = $request->address_1;
            $address->address_line_2        = $request->address_2;
            $address->city                  = $request->city;
            $address->state                 = $request->state;
            $address->zip_code              = $request->zip_code;
            $address->country               = $request->country;
            $address->save();
        } else {
            $request->validate([
                'email' => 'required|max:255|unique:users,email,'.$id,
                'phone' => 'required|max:255|unique:users,phone,'.$id,
                'firstName' => 'required',
                'lastName' => 'required',
                'avatar' =>'image|max:2048|mimes:png,jpeg,jpg',
            ]);
            $user                       = User::find($id);
            $user->name                 = $request->firstName.' '.$request->lastName;
            $user->email                = $request->email;
            $user->phone                = $request->phone;
            if ($request->hasFile('avatar')) {
                $user->profile_photo_path   = $this->upload_image($request->file('avatar'), $user->profile_photo_path);
            }
            $user->save();
        }
        return Redirect::back()->with('success', 'Customer was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $customer = User::find($id);
        if ($customer->profile_photo_path != null) {
            $old_upload = Upload::find($customer->profile_photo_path);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $orders = Order::where('customer_id', $customer->id)->get();
        if (count($orders) > 0) {
            foreach ($orders as $order) {
                $order_details = OrderDetail::where('order_id', $order->id)->get();
                if (count($order_details) > 0) {
                    foreach ($order_details as $order_detail) {
                        $order_detail->delete();
                    }
                }
                $order->delete();
            }
        }
        $customer->delete();
        return Redirect::route('customers.index')->with('success', 'Collection was successfully deleted!');
    }


    /**
     * Upload the specified image in storage.
     *
     * @param  array  $file
     * @return \Illuminate\Http\Response
     */
    protected function upload_image($file, $image_id = null)
    {
        if ($image_id !== null) {
            $old_upload = Upload::find($image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $file_original_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_original_name,PATHINFO_FILENAME);
        $image_name = $fileName. '-' .time(). '.' . $file->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($file)->save(public_path('uploads/services/' . $image_name));
        // Insert Image Path To Database
        $upload = new Upload();
        $upload->name = $image_name;
        $upload->size = $file->getSize();
        $upload->type = $file->getMimeType();
        $upload->path = 'uploads/services/' . $image_name;
        $upload->save();

        return $upload->id;
    }
}
