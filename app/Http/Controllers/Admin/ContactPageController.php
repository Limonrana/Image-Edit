<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pageoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.pages.page.common.contact');
    }

    /**
     * Update the about section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_contact(Request $request)
    {
        $contact_with_us_items      = count($request->contact_item_value_1) > 0 ? $this->generate_json([$request->contact_item_value_1, $request->contact_item_value_2, $request->contact_item_icon], ['value_1', 'value_2', 'icon']) : null;

        $contact_us_array = [
            'contact_form_title'                => $request->contact_form_title,
            'contact_with_us_title'             => $request->contact_with_us_title,
            'contact_location_url'              => $request->contact_location_url,
            'contact_with_us_items'             => $contact_with_us_items,
        ];

        $all_page_option = $this->generate_page_option($contact_us_array);

        $page_option = Pageoption::where('page', 'contact')->where('option', 'contact-us-details')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'contact',
                'option' => 'contact-us-details',
                'option_value' => $all_page_option,
            ]);
        }
        return Redirect::back()->with('success', 'Page section was successfully updated!');
    }

    /**
     * Update the about section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_seo(Request $request)
    {
        $meta_keywords = isset($request->home_meta_keywords) ? $this->generate_tags($request->home_meta_keywords) : null;
        $all_page_option = [
            'home_meta_title'            => $request->home_meta_title,
            'home_meta_description'      => $request->home_meta_description,
            'home_meta_keywords'         => $meta_keywords,
        ];
        $all_page_option = $this->generate_page_option($all_page_option);
        $page_option = Pageoption::where('page', 'contact')->where('option', 'contact-seo-meta')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'contact',
                'option' => 'contact-seo-meta',
                'option_value' => $all_page_option,
            ]);
        }
        return Redirect::back()->with('success', 'Page section was successfully updated!');
    }
}
