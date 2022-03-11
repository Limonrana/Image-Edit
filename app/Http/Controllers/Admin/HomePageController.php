<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pageoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.pages.page.common.home');
    }

    /**
     *  Store the slider section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_slider(Request $request)
    {
        $shape_image     = null;
        $banner_image    = null;

        if ($request->hasFile('shape_image')) {
            $shape_image = $this->upload_image($request->file('shape_image'));
        }

        if ($request->hasFile('banner_image')) {
            $banner_image = $this->upload_image($request->file('banner_image'));
        }

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-slider')->first();

        $new_slider_array = [
            'title'                     => $request->title,
            'subtitle'                  => $request->subtitle,
            'btn_text'                  => $request->btn_text,
            'btn_url'                   => $request->btn_url,
            'btn_text_color'            => $request->btn_text_color,
            'btn_bg_color'              => $request->btn_bg_color,
            'btn_bg_hover_color'        => $request->btn_bg_hover_color,
            'video_btn_text'            => $request->video_btn_text,
            'video_btn_url'             => $request->video_btn_url,
            'video_btn_icon_color'      => $request->video_btn_icon_color,
            'video_btn_bg_color'        => $request->video_btn_bg_color,
            'shape_image'               => $shape_image,
            'banner_image'              => $banner_image,
        ];

        $old_value = isset($page_option) ? json_decode($page_option->option_value) : [];

        if ($old_value !== null) {
            array_push($old_value, $new_slider_array);
        } else {
            $old_value = [$new_slider_array];
        }

        $all_page_option = $this->generate_page_option($old_value);

        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-slider',
                'option_value' => $all_page_option,
            ]);
        }
        return Redirect::back()->with('success', 'Page slider was successfully added!');
    }

    /**
     * Update & Store the slider section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_slider(Request $request)
    {
        $shape_images     = isset($request->_shape_image) ? $request->_shape_image : [];
        $banner_images    = isset($request->_banner_image) ? $request->_banner_image : [];

        if ($request->hasFile('shape_image')) {
            foreach ($shape_images as $key => $shape_image) {
                $shape_images[$key] = $this->upload_image($request->file('shape_image'), $shape_image);
            }
        }

        if ($request->hasFile('banner_image')) {
            foreach ($shape_images as $key => $banner_image) {
                $banner_images[$key] = $this->upload_image($request->file('banner_image'), $banner_image);
            }
        }

        $new_slider_array = [
            $request->title,
            $request->subtitle,
            $request->btn_text,
            $request->btn_url,
            $request->btn_text_color,
            $request->btn_bg_color,
            $request->btn_bg_hover_color,
            $request->video_btn_text,
            $request->video_btn_url,
            $request->video_btn_icon_color,
            $request->video_btn_bg_color,
            $shape_images,
            $banner_images,
        ];

        $array_keys = ['title', 'subtitle', 'btn_text', 'btn_url', 'btn_text_color', 'btn_bg_color', 'btn_bg_hover_color', 'video_btn_text', 'video_btn_url', 'video_btn_icon_color', 'video_btn_bg_color', 'shape_image', 'banner_image'];

        $all_page_option = $this->generate_json($new_slider_array, $array_keys);

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-slider')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        }
        return Redirect::back()->with('success', 'Page slider was successfully updated!');
    }

    /**
     * Update the about section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_about(Request $request)
    {
        $award_image        = $request->_award_image;
        $lg_banner_image    = $request->_lg_banner_image;
        $sm_banner_image    = $request->_sm_banner_image;

        if ($request->hasFile('home_about_award_image')) {
            $award_image = $this->upload_image($request->file('home_about_award_image'), $award_image);
        }

        if ($request->hasFile('home_about_lg_banner_image')) {
            $lg_banner_image = $this->upload_image($request->file('home_about_lg_banner_image'), $lg_banner_image);
        }

        if ($request->hasFile('home_about_sm_banner_image')) {
            $sm_banner_image = $this->upload_image($request->file('home_about_sm_banner_image'), $sm_banner_image);
        }

        $upload_array = [
            'home_about_award_image'        => $award_image,
            'home_about_lg_banner_image'    => $lg_banner_image,
            'home_about_sm_banner_image'    => $sm_banner_image,
        ];

        $all_page_option = $this->generate_page_option($request->all(), $upload_array);

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-about')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-about',
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
    public function update_service(Request $request)
    {
        $all_page_option = $this->generate_page_option($request->all());

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-service')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-service',
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
    public function update_choose_us(Request $request)
    {
        $home_choose_us_banner_image = $request->_home_choose_us_banner_image;
        if ($request->hasFile('home_choose_us_banner_image')) {
            $home_choose_us_banner_image = $this->upload_image($request->file('home_choose_us_banner_image'), $home_choose_us_banner_image);
        }

        $home_choose_us_info = count($request->home_choose_us_info_title) > 0 ? $this->generate_json([$request->home_choose_us_info_title, $request->home_choose_us_info_description], ['title', 'description']) : null;
        $others_array = [
            'home_choose_us_title'               => $request->home_choose_us_title,
            'home_choose_us_subtitle'            => $request->home_choose_us_subtitle,
            'home_choose_us_banner_image'        => $home_choose_us_banner_image,
            'home_choose_us_info'                => $home_choose_us_info,
        ];


        $all_page_option = $this->generate_page_option($others_array);

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-choose-us')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-choose-us',
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
    public function update_achievement(Request $request)
    {
        $home_achievement_background_image  = $request->_achievement_background_image;
        $home_achievement_banner_image      = $request->_achievement_banner_image;

        if ($request->hasFile('home_achievement_background_image')) {
            $home_achievement_background_image = $this->upload_image($request->file('home_achievement_background_image'), $home_achievement_background_image);
        }
        if ($request->hasFile('home_achievement_banner_image')) {
            $home_achievement_banner_image = $this->upload_image($request->file('home_achievement_banner_image'), $home_achievement_banner_image);
        }

        $home_achievement_counters = count($request->home_achievement_counters_title) > 0 ? $this->generate_json([$request->home_achievement_counters_title, $request->home_achievement_counters_value, $request->home_achievement_counters_icon], ['title', 'value', 'icon']) : null;
        $others_array = [
            'home_achievement_contact_title'                => $request->home_achievement_contact_title,
            'home_achievement_contact_btn_text'             => $request->home_achievement_contact_btn_text,
            'home_achievement_contact_btn_url'              => $request->home_achievement_contact_btn_url,
            'home_achievement_title'                        => $request->home_achievement_title,
            'home_achievement_experience'                   => $request->home_achievement_experience,
            'home_achievement_description'                  => $request->home_achievement_description,
            'home_achievement_background_image'             => $home_achievement_background_image,
            'home_achievement_banner_image'                 => $home_achievement_banner_image,
            'home_achievement_counters'                     => $home_achievement_counters,
        ];

        $all_page_option = $this->generate_page_option($others_array);

        $page_option = Pageoption::where('page', 'home')->where('option', 'home-achievement')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-achievement',
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
    public function update_others(Request $request)
    {
        $all_page_option = $this->generate_page_option($request->all());
        $page_option = Pageoption::where('page', 'home')->where('option', 'home-others-sections')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-others-sections',
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
        $page_option = Pageoption::where('page', 'home')->where('option', 'home-seo-meta')->first();
        if (isset($page_option)) {
            $page_option->option_value = $all_page_option;
            $page_option->save();
        } else {
            Pageoption::create([
                'page' => 'home',
                'option' => 'home-seo-meta',
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
