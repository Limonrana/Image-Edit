<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Pageoption;
use App\Models\Post;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redirect;

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
     * Display a listing of about page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function page($page_slug)
    {
        $page = Page::where('slug', $page_slug)->first();
        $brands = Client::where('status', true)->latest()->get();
        return view('frontend.pages.page', compact('page', 'brands'));
    }

    /**
     * Display a listing of blogs page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function blogs(Request $request)
    {
        // Search Query String
        $search = $request->search;
        // Find Specific Category Related Blogs Query String
        $category = $request->category;
        $category_id = $request->cid;
        // Find Specific Tags Related Blogs Query String
        $tag = $request->tag;
        $tag_id = $request->tid;
        if (isset($search)) {
            $blogs = Post::where('status', true)->where('title', 'LIKE', '%' . $search . '%')->latest()->paginate(10);
        } else if (isset($category_id) && isset($category)) {
            $blogs = Post::where('status', true)->where('category_id', $category_id)->latest()->paginate(10);
        } else if (isset($tag) && isset($tag_id)) {
            $tag_blogs = Tag::whereHas('blogs', function ($query) {
                            return $query->where('status', '=', true);
                        })->with('blogs')->find($tag_id);
            if (isset($tag_blogs)) {
                $blogs = $tag_blogs->blogs()->latest()->paginate(1000);
            } else {
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $items = [];
                $currentItems = array_slice($items, 10 * ($currentPage - 1), 10);
                $paginator = new LengthAwarePaginator($currentItems, count($items), 10, $currentPage);
                $blogs = $paginator->appends('filter', request('filter'));
            }
        } else {
            $blogs = Post::where('status', true)->latest()->paginate(10);
        }
        $recent_blogs = Post::where('status', true)->latest()->take(5)->get();
        $brands = Client::where('status', true)->latest()->get();
        $categories = Category::latest()->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('frontend.pages.blogs', compact('blogs', 'brands', 'categories', 'tags', 'recent_blogs', 'search'));
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
        $next = Post::where('id', '>', $blog->id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $blog->id)->orderBy('id','desc')->first();
        $comments = Comment::where('post_id', $blog->id)->where('status', true)->latest()->get();
        $recent_blogs = Post::where('status', true)->whereNotIn('id', [$blog->id])->latest()->take(5)->get();
        $brands = Client::where('status', true)->latest()->get();
        $categories = Category::latest()->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('frontend.pages.single-blog', compact('blog', 'next', 'previous', 'comments', 'recent_blogs', 'brands', 'categories', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBlogComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comment' => 'required',
        ]);

        $comment                        = new Comment();
        $comment->post_id               = $id;
        $comment->customer_id           = $request->customer_id;
        $comment->name                  = $request->name;
        $comment->email                 = $request->email;
        $comment->comment               = $request->comment;
        $comment->status                = true;
        $comment->save();

        return Redirect::back()->with('success', 'Comment was successfully added!');
    }

    /**
     * Display a listing of projects page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function projects()
    {
        $page = Pageoption::where('page', 'project')->get();
        $brands = Client::where('status', true)->latest()->get();
        $services = Service::where('status', true)->latest()->get();
        $projects = Project::where('status', true)->latest()->get();
        $page_options = [];
        $seo_meta = [];
        foreach ($page as $option) {
            if ($option->option == 'project-seo-meta') {
                $seo_meta = json_decode($option->option_value, true);
            } else {
                $page_options[$option->option] = json_decode($option->option_value, true);
            }
        }
        return view('frontend.pages.projects', compact('page_options', 'brands', 'services', 'projects', 'seo_meta'));
    }

    /**
     * Display the specified single project resource.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function projectShow($slug)
    {
        $brands = Client::where('status', true)->latest()->get();
        $project = Project::with('service')->where('slug', $slug)->first();
        $related_projects = Project::where('status', true)->whereNotIn('id', [$project->id])->latest()->take(3)->get();
        return view('frontend.pages.single-project', compact('project', 'related_projects', 'brands'));
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
     * Store subscriber a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:32|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return Redirect::back()->with('success', 'Configuration! you have successfully subscribed!');
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
