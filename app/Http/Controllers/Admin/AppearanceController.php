<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pageoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.pages.page.appearance');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $option)
    {
        $logo = $request->_logo;
        $image_name = $option.'_logo';

        if ($request->hasFile('page_bg_image')) {
            $image_name = 'page_bg_image';
        }

        if ($request->hasFile($image_name)) {
            if ($logo !== null) {
                $logo = $this->single_upload($request->file($image_name), 'web', $logo);
            } else {
                $logo = $this->single_upload($request->file($image_name), 'web');
            }
        }
        $page_option = Pageoption::where('page', 'all')->where('option', $option)->first();
        if (isset($page_option)) {
            $page_option->option_value = $this->generate_page_option($request->all(), [$image_name => $logo]);
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'all',
                'option' => $option,
                'option_value' => $this->generate_page_option($request->all(), [$image_name => $logo])
            ]);
        }
        return Redirect::back()->with('success', 'Appearance was created successfully updated!');
    }
}
