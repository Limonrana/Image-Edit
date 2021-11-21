<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Service;
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
        return view('frontend.pages.home', compact('brands'));
    }

    /**
     * Display a listing of about page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    /**
     * Display a listing of contact page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Display a listing of blogs page all the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function blogs()
    {
        return view('frontend.pages.blogs');
    }

    /**
     * Display the specified single blog resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function blogShow($id)
    {
        return view('frontend.pages.single-blog');
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
