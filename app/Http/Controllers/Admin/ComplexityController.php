<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Complexity;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComplexityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $complexities = Complexity::all();
        return view('admin.pages.service.image-type-price', compact('complexities'));
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
            'name'      => 'required|unique:complexities|max:255',
            'price'    => 'required',
            'status'    => 'required',
            'image'     => 'required|image|max:2048|mimes:png,jpeg,jpg',
        ]);

        if ($request->hasFile('image')) {
            $upload = $this->single_upload($request->file('image'), 'complexities');
        }

        $complexity = new Complexity();
        $complexity->name = $request->name;
        $complexity->price = $request->price;
        $complexity->status = isset($request->status) ? true : false;
        $complexity->image_id = isset($upload) ? $upload : null;
        $complexity->save();
        return Redirect::back()->with('success', 'Image Complexity was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $complexity = Complexity::with('image')->find($id);
        return response()->json($complexity);
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
        $request->validate([
            'name'      => 'required|max:255|unique:complexities,name,'.$request->id,
            'price'     => 'required',
            'status'    => 'required',
            'image'     => 'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $complexity                 = Complexity::find($request->id);
        $complexity->name           = $request->name;
        $complexity->price          = $request->price;
        $complexity->status         = isset($request->status) ? true : false;
        if ($request->hasFile('image')) {
            $complexity->image_id   = $this->single_upload($request->file('image'), 'complexities', $complexity->image_id);
        }
        $complexity->save();
        return Redirect::back()->with('success', 'Image Complexity was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $complexity = Complexity::find($id);
        if ($complexity->image_id !== null) {
            $old_upload = Upload::find($complexity->image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $complexity->delete();
        return Redirect::back()->with('success', 'Image Complexity was successfully deleted!');
    }
}
