<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Pageoption;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $menus = Pageoption::where('page', 'all')->get();
        return view('admin.pages.menu.menus');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $type
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($type)
    {
        $pages = Page::where('status', true)->select('id', 'title', 'slug')->get();
        $services = Service::where('status', true)->select('id', 'title', 'slug')->get();
        $page_options = Pageoption::where('page', 'all')->where('option', $type)->first();
        $menus = [];
        if ($page_options) {
            $menus = json_decode($page_options->option_value, true);
        }

        $static_pages = Collection::make([
            ['slug' => '/', 'title' => 'Home'],
            ['slug' => '/about', 'title' => 'About'],
            ['slug' => '/contact', 'title' => 'Contact'],
            ['slug' => '/blog', 'title' => 'Blog'],
            ['slug' => '/services', 'title' => 'Services'],
            ['slug' => '/projects', 'title' => 'Projects'],
        ])->sortBy('title');

        return view('admin.pages.menu.edit-menu', compact('pages', 'services', 'static_pages', 'type', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $type)
    {
        $this->validate($request, [
            'type' => 'required|array',
            'page' => 'required|array',
        ]);

        $build_menu = $this->generate_json([$request->type, $request->page, $request->title], ['type', 'page', 'title']);

        $page_option = Pageoption::where('page', 'all')->where('option', $type)->first();
        if (isset($page_option)) {
            $page_option->option_value = $build_menu;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'all',
                'option' => $type,
                'option_value' => $build_menu,
            ]);
        }

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }
}
