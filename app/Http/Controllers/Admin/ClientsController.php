<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.pages.common.clients', compact('clients'));
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
            'name'      => 'required|unique:clients|max:255',
            'status'    => 'required',
            'image'     => 'required|image|max:2048|mimes:png,jpeg,jpg|dimensions:min_width=131,min_height=51|dimensions:max_width=330,max_height=250',
        ]);

        if ($request->hasFile('image')) {
            $upload = $this->upload_image($request->file('image'));
        }

        $client             = new Client();
        $client->name       = $request->name;
        $client->status     = $request->status;
        $client->image_id   = isset($upload) ? $upload : null;
        $client->save();
        return Redirect::back()->with('success', 'Client was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $client = Client::with('image')->find($id);
        return response()->json($client);
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
            'name'      => 'required|max:255|unique:clients,name,'.$request->id,
            'status'    => 'required',
            'image'     => 'image|max:2048|mimes:png,jpeg,jpg|dimensions:min_width=131,min_height=51|dimensions:max_width=330,max_height=250',
        ]);

        $client                 = Client::find($request->id);
        $client->name           = $request->name;
        $client->status         = $request->status;
        if ($request->hasFile('image')) {
            $upload             = $this->upload_image($request->file('image'), $client->image_id);
            $client->image_id   = $upload;
        }
        $client->save();
        return Redirect::back()->with('success', 'Client was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client->image_id !== null) {
            $old_upload = Upload::find($client->image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $client->delete();
        return Redirect::back()->with('success', 'Client was successfully deleted!');
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
        $image_name = time(). '.' . $file->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($file)->resize(131, 51)->save(public_path('uploads/clients/' . $image_name));
        // Insert Image Path To Database
        $upload = new Upload();
        $upload->name = $image_name;
        $upload->size = $file->getSize();
        $upload->type = $file->getMimeType();
        $upload->path = 'uploads/clients/' . $image_name;
        $upload->save();

        return $upload->id;
    }
}
