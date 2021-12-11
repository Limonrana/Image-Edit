<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Tag;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.pages.blog.tags', compact('tags'));
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
            'name'      => 'required|unique:tags|max:255',
            'slug'      => 'required|unique:tags|max:255',
        ]);

        $meta_keywords = [];
        if (isset($request->meta_keywords)) {
            $keywords = json_decode($request->meta_keywords, true);
            foreach ($keywords as $keyword) {
                array_push($meta_keywords, $keyword['value']);
            }
        }

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->meta_title = $request->meta_title;
        $tag->meta_description = $request->meta_description;
        $tag->meta_keywords = isset($request->meta_keywords) ? json_encode($meta_keywords) : null;
        $tag->save();
        return Redirect::back()->with('success', 'Tag was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return response()->json($tag);
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
            'name'      => 'required|max:255|unique:tags,name,'.$request->id,
            'slug'      => 'required|max:255|unique:tags,slug,'.$request->id,
        ]);

        $tag                     = Tag::find($request->id);
        $meta_keywords           = $this->generate_modal_tags($tag->meta_keywords, $request->meta_keywords);
        $tag->name               = $request->name;
        $tag->slug               = $request->slug;
        $tag->meta_title         = $request->meta_title;
        $tag->meta_description   = $request->meta_description;
        $tag->meta_keywords      = json_encode($meta_keywords);
        $tag->save();
        return Redirect::back()->with('success', 'Tag was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return Redirect::back()->with('success', 'Tag was successfully deleted!');
    }
}
