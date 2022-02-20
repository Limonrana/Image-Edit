<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pageoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.pages.page.common.about');
    }

    /**
     * Update the about section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_about(Request $request)
    {
        $bg_image    = $request->_bg_image_id;

        if ($request->hasFile('about_about_us_bg_image')) {
            $bg_image = $this->upload_image($request->file('about_about_us_bg_image'), $bg_image);
        }

        $about_about_us_points      = count($request->point_title) > 0 ? $this->generate_json([$request->point_title, $request->point_icon, $request->point_description], ['title', 'icon', 'description']) : null;
        $about_about_us_skills      = count($request->skill_progress_name) > 0 ? $this->generate_json([$request->skill_progress_name, $request->skill_progress_value], ['name', 'value']) : null;
        $about_about_us_counters    = count($request->about_counters_title) > 0 ? $this->generate_json([$request->about_counters_title, $request->about_counters_value, $request->about_counters_icon], ['title', 'value', 'icon']) : null;

        $about_us_array = [
            'about_about_us_title'              => $request->about_about_us_title,
            'about_about_us_descriptions'       => $request->about_about_us_descriptions,
            'about_about_us_box_title'          => $request->about_about_us_box_title,
            'about_about_us_box_descriptions'   => $request->about_about_us_box_descriptions,
            'about_about_skill_title'           => $request->about_about_skill_title,
            'about_about_skill_experience'      => $request->about_about_skill_experience,
            'about_about_skill_descriptions'    => $request->about_about_skill_descriptions,
            'about_about_us_points'             => $about_about_us_points,
            'about_about_us_skills'             => $about_about_us_skills,
            'about_about_us_counters'           => $about_about_us_counters,
        ];

        $upload_array = [
            'about_about_us_bg_image'    => $bg_image,
        ];

        $all_page_option = $this->generate_page_option($about_us_array, $upload_array);

        $page_option = Pageoption::where('page', 'about')->where('option', 'about-about-details')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'about',
                'option' => 'about-about-details',
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
        $page_option = Pageoption::where('page', 'about')->where('option', 'about-seo-meta')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'about',
                'option' => 'about-seo-meta',
                'option_value' => $all_page_option,
            ]);
        }
        return Redirect::back()->with('success', 'Page section was successfully updated!');
    }

    /**
     * Remove and Upload the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_image($file, $id = null)
    {
        $image = null;
        if ($id !== null) {
            $image = $this->single_upload($file, 'web', $id);
        } else {
            $image = $this->single_upload($file, 'web');
        }
        return $image;
    }
}
