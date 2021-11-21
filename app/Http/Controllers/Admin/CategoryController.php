<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.pages.blog.categories', compact('categories'));
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
            'name'      => 'required|unique:categories|max:255',
            'slug'      => 'required|unique:categories|max:255',
        ]);

        $meta_keywords = [];
        if (isset($request->meta_keywords)) {
            $keywords = json_decode($request->meta_keywords, true);
            foreach ($keywords as $keyword) {
                array_push($meta_keywords, $keyword['value']);
            }
        }

        $category                    = new Category();
        $category->name              = $request->name;
        $category->slug              = $request->slug;
        $category->meta_title        = $request->meta_title;
        $category->meta_description  = $request->meta_description;
        $category->meta_keywords     = isset($request->meta_keywords) ? json_encode($meta_keywords) : null;
        $category->save();
        return Redirect::back()->with('success', 'Category was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
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
            'name'      => 'required|max:255|unique:categories,name,'.$request->id,
            'slug'      => 'required|max:255|unique:categories,slug,'.$request->id,
        ]);

        $category                     = Category::find($request->id);
        $meta_keywords                = $this->generate_tags($category->meta_keywords, $request->meta_keywords);
        $category->name               = $request->name;
        $category->slug               = $request->slug;
        $category->meta_title         = $request->meta_title;
        $category->meta_description   = $request->meta_description;
        $category->meta_keywords      = json_encode($meta_keywords);
        $category->save();
        return Redirect::back()->with('success', 'Category was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return Redirect::back()->with('success', 'Category was successfully deleted!');
    }

    /**
     * Upload the specified image in storage.
     *
     * @param  array  $old_tags
     * @param  array  $new_tags
     * @return array
     */
    protected function generate_tags($old_tags, $new_tags)
    {
        $new_meta_keywords = [];
        if (isset($new_tags)) {
            $keywords = json_decode($new_tags, true);
            foreach ($keywords as $keyword) {
                array_push($new_meta_keywords, $keyword['value']);
            }
        }
        $meta_keywords = [];
        $array_old_tags = json_decode($old_tags, true);
        foreach ($new_meta_keywords as $key => $tag) {
            $find_single_old_tag = array_search($tag, $array_old_tags);
            if ($find_single_old_tag === false) {
                array_push($meta_keywords, $tag);
            }
        }
        return array_merge($meta_keywords, $array_old_tags);
    }
}
