<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Pageoption;
use App\Models\Post;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of home page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        $brands = Client::where('status', true)->latest()->get();
        $services = Service::where('status', true)->latest()->get();
        $blogs = Post::where('status', true)->latest()->take(3)->get();
        $projects = Project::where('status', true)->latest()->take(6)->get();
        $page = Pageoption::where('page', 'home')->get();
        $reviews = Review::where('status', true)->latest()->get();
        $page_options = [];
        $selected_services = [];
        $seo_meta = [];
        foreach ($page as $option) {
            if ($option->option == 'home-seo-meta') {
                $seo_meta = json_decode($option->option_value, true);
            } else {
                $page_options[$option->option] = json_decode($option->option_value, true);
            }
        }
        if (isset($page_options['home-service']['home_service_list'])) {
            foreach ($page_options['home-service']['home_service_list'] as $service) {
                foreach ($services as $value) {
                    if ($service == $value->id) {
                        $selected_services[] = $value;
                        break;
                    }
                }
            }
        }
        return view('frontend.pages.home', compact('page_options', 'brands', 'selected_services', 'blogs', 'projects', 'reviews', 'seo_meta'));
    }

    /**
     * Display a listing of about page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function about()
    {
        $page = Pageoption::where('page', 'about')->get();
        $brands = Client::where('status', true)->latest()->get();
        $page_options = [];
        $seo_meta = [];
        foreach ($page as $option) {
            if ($option->option == 'about-seo-meta') {
                $seo_meta = json_decode($option->option_value, true);
            } else {
                $page_options[$option->option] = json_decode($option->option_value, true);
            }
        }
        return view('frontend.pages.about', compact('page_options', 'brands', 'seo_meta'));
    }

    /**
     * Display a listing of contact page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function contact()
    {
        $page = Pageoption::where('page', 'contact')->get();
        $brands = Client::where('status', true)->latest()->get();
        $page_options = [];
        $seo_meta = [];
        foreach ($page as $option) {
            if ($option->option == 'contact-seo-meta') {
                $seo_meta = json_decode($option->option_value, true);
            } else {
                $page_options[$option->option] = json_decode($option->option_value, true);
            }
        }
        return view('frontend.pages.contact', compact('page_options', 'brands', 'seo_meta'));
    }

    /**
     * Display a listing of blogs page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function blogs()
    {
        $blogs = Post::where('status', true)->latest()->paginate(10);
        $recent_blogs = Post::where('status', true)->latest()->take(5)->get();
        $clients = Client::where('status', true)->latest()->get();
        $categories = Category::latest()->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('frontend.pages.blogs', compact('blogs', 'clients', 'categories', 'tags', 'recent_blogs'));
    }

    /**
     * Display the specified single blog resource.
     *
     * @param  String $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function blogShow($slug)
    {
        $blog = Post::where('slug', $slug)->first();
        $recent_blogs = Post::where('status', true)->whereNotIn('id', [$blog->id])->latest()->take(5)->get();
        $clients = Client::where('status', true)->latest()->get();
        $categories = Category::latest()->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('frontend.pages.single-blog', compact('blog', 'recent_blogs', 'clients', 'categories', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBlogComment(Request $request)
    {

    }

    /**
     * Display a listing of projects page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function projects()
    {
        return view('frontend.pages.projects');
    }

    /**
     * Display the specified single project resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function projectShow($id)
    {
        return view('frontend.pages.single-project');
    }

    /**
     * Display a listing of projects page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function services()
    {
        $services = Service::where('status', true)->latest()->get();
        return view('frontend.pages.services', compact('services'));
    }

    /**
     * Display the specified single project resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $related_services = Service::where('status', true)
                                ->where('collection_id', $service->collection_id)
                                ->whereNotIn('slug', [$slug])
                                ->latest()->take(3)->get();
        return view('frontend.pages.single-service', compact('service', 'related_services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
