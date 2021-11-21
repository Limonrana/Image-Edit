<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view('admin.pages.common.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pages = Page::latest()->get();
        $common_pages = [
            ['title' => 'Home', 'slug' => '/', 'route' => 'home'],
            ['title' => 'About', 'slug' => '/about', 'route' => 'about'],
            ['title' => 'Contact', 'slug' => '/contact', 'route' => 'contact'],
        ];
        return view('admin.pages.page.pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.pages.page.add-page');
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
            'title' => 'required|max:255|unique:pages',
            'slug' => 'required|max:255|unique:pages',
        ]);

        $page                       = new Page();
        $page->title                = $request->title;
        $page->slug                 = $request->slug;
        $page->description          = $request->description;
        $page->status               = isset($request->status) ? true : false;
        $page->meta_title           = $request->meta_title;
        $page->meta_description     = $request->meta_description;
        $page->meta_keywords        = isset($request->meta_keywords) ? json_encode($this->generate_tags($request->meta_keywords)) : null;
        $page->save();

        return Redirect::route('pages.index')->with('success', 'Page was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request, $id)
    {
        $page           = Page::find($id);
        $page->status   = !$page->status;
        $page->save();
        return Redirect::route('pages.index')->with('success', 'Page status was updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.page.edit-page', compact('page'));
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
            'title' => 'required|max:255|unique:pages,title,'.$id,
            'slug' => 'required|max:255|unique:pages,slug,'.$id,
        ]);

        $page                       = Page::find($id);
        $page->title                = $request->title;
        $page->slug                 = $request->slug;
        $page->description          = $request->description;
        $page->status               = isset($request->status) ? true : false;
        $page->meta_title           = $request->meta_title;
        $page->meta_description     = $request->meta_description;
        $page->meta_keywords        = isset($request->meta_keywords) ? json_encode($this->generate_tags($request->meta_keywords)) : null;
        $page->save();

        return Redirect::back()->with('success', 'Page was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return Redirect::back()->with('success', 'Page was successfully deleted!');
    }



    /**
     * Manage tag list from json to array.
     *
     * @param  array  $tags
     * @return array
     */
    protected function generate_tags($tags)
    {
        $new_meta_keywords = [];
        if (isset($tags)) {
            $keywords = json_decode($tags, true);
            foreach ($keywords as $keyword) {
                array_push($new_meta_keywords, $keyword['value']);
            }
        }
        return $new_meta_keywords;
    }


    // Common Pages Methods Start

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function commonEdit($slug)
    {
        return view('admin.pages.page.common.'.$slug);
    }
}
