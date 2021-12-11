<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $collections = Collection::all();
        return view('admin.pages.common.collection', compact('collections'));
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
            'name'      => 'required|unique:collections|max:255',
            'slug'      => 'required|unique:collections|max:255',
            'status'    => 'required',
            'image'     => 'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $meta_keywords = [];
        if (isset($request->meta_keywords)) {
            $keywords = json_decode($request->meta_keywords, true);
            foreach ($keywords as $keyword) {
                array_push($meta_keywords, $keyword['value']);
            }
        }

        if ($request->hasFile('image')) {
            $upload = $this->single_upload($request->file('image'), 'collections');
        }

        $collection = new Collection();
        $collection->name = $request->name;
        $collection->slug = $request->slug;
        $collection->status = $request->status;
        $collection->meta_title = $request->meta_title;
        $collection->meta_description = $request->meta_description;
        $collection->meta_keywords = isset($request->meta_keywords) ? json_encode($meta_keywords) : null;
        $collection->image_id = isset($upload) ? $upload : null;
        $collection->save();
        return Redirect::back()->with('success', 'Collection was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $collection = Collection::with('image')->find($id);
        return response()->json($collection);
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
        $validated = $request->validate([
            'name'      => 'required|max:255|unique:collections,name,'.$request->id,
            'slug'      => 'required|max:255|unique:collections,slug,'.$request->id,
            'status'    => 'required',
            'image'     => 'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $collection = Collection::find($request->id);
        $meta_keywords = $this->generate_modal_tags($collection->meta_keywords, $request->meta_keywords);
        $collection->name = $request->name;
        $collection->slug = $request->slug;
        $collection->status = $request->status;
        $collection->meta_title = $request->meta_title;
        $collection->meta_description = $request->meta_description;
        $collection->meta_keywords = json_encode($meta_keywords);
        if ($request->hasFile('image')) {
            $upload = $this->single_upload($request->file('image'), 'collections', $collection->image_id);
            $collection->image_id = $upload;
        }
        $collection->save();
        return Redirect::back()->with('success', 'Collection was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);
        if ($collection->image_id !== null) {
            $old_upload = Upload::find($collection->image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $collection->delete();
        return Redirect::back()->with('success', 'Collection was successfully deleted!');
    }

}
