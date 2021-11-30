<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class UserAddressController extends Controller
{
    /**
     * Show the general profile settings screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Profile/Address', [
            'address' => $request->user()->address,
            'state' => State::all(),
            'country' => Country::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'user_id' => ['required'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:12'],
            'state' => ['required', 'integer'],
            'country' => ['required', 'integer'],
        ], [
            'user_id.required' => 'The user must be need to login.',
            'state.integer' => 'The state field is required.',
            'country.integer' => 'The country field is required.',
        ])->validate();

        $address                    = new Address();
        $address->user_id           = $request->user_id;
        $address->address_line_1    = $request->address_line_1;
        $address->address_line_2    = $request->address_line_2;
        $address->company_name      = $request->company_name;
        $address->city              = $request->city;
        $address->zip_code          = $request->zip_code;
        $address->state             = $request->state;
        $address->country           = $request->country;
        $address->save();
        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'user_id' => ['required'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:12'],
            'state' => ['required', 'integer'],
            'country' => ['required', 'integer'],
        ], [
            'user_id.required' => 'The user must be need to login.',
            'state.integer' => 'The state field is required.',
            'country.integer' => 'The country field is required.',
        ])->validate();

        $address                    = Address::find($request->id);
        $address->user_id           = $request->user_id;
        $address->address_line_1    = $request->address_line_1;
        $address->address_line_2    = $request->address_line_2;
        $address->company_name      = $request->company_name;
        $address->city              = $request->city;
        $address->zip_code          = $request->zip_code;
        $address->state             = $request->state;
        $address->country           = $request->country;
        $address->save();
        return Redirect::back();
    }
}
