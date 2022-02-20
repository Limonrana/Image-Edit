<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Project;
use App\Models\Service;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.pages.project.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.pages.project.add-projects', compact('services'));
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
            'title'             => 'required|max:255|unique:projects',
            'slug'              => 'required|max:255|unique:projects',
            'service'           => 'required',
            'tools_used'        => 'required',
            'client_name'       => 'required',
            'creating_date'     => 'required',
            'featured_image'    =>'required|image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_1'    =>'required|image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_2'    =>'required|image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_3'    =>'required|image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $project                        = new Project();
        $project->title                 = $request->title;
        $project->slug                  = $request->slug;
        $project->description           = $request->description;
        $project->service_id            = $request->service;
        $project->status                = isset($request->status) ? true : false;
        $project->client_name           = $request->client_name;
        $project->creating_date         = $request->creating_date;
        $project->meta_title            = $request->meta_title;
        $project->meta_description      = $request->meta_description;
        $project->meta_keywords         = isset($request->meta_keywords) ? $this->generate_tags($request->meta_keywords) : null;
        $project->tools_used            = isset($request->tools_used) ? $this->generate_tags($request->tools_used) : null;
        $project->working_process       = count($request->process_title) > 0 ? $this->generate_json([$request->process_title, $request->process_description], ['title', 'description']) : null;
        $project->featured_image_id     = $request->hasFile('featured_image') ? $this->single_upload($request->file('featured_image'), 'projects') : null;
        $project->banner_image_1        = $request->hasFile('banner_image_1') ? $this->single_upload($request->file('banner_image_1'), 'projects') : null;
        $project->banner_image_2        = $request->hasFile('banner_image_2') ? $this->single_upload($request->file('banner_image_2'), 'projects') : null;
        $project->banner_image_3        = $request->hasFile('banner_image_3') ? $this->single_upload($request->file('banner_image_3'), 'projects') : null;
        $project->save();

        return Redirect::route('projects.index')->with('success', 'Project was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $project = Project::find($id);
        $project->status = !$project->status;
        $project->save();
        return Redirect::back()->with('success', 'Project status was successfully updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $services = Service::all();
        return view('admin.pages.project.edit-projects', compact('project', 'services'));
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
            'title'             => 'required|max:255|unique:projects,title,'.$id,
            'slug'              => 'required|max:255|unique:projects,slug,'.$id,
            'service'           => 'required',
            'tools_used'        => 'required',
            'client_name'       => 'required',
            'creating_date'     => 'required',
            'featured_image'    => 'image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_1'    => 'image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_2'    => 'image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_3'    => 'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $project                        = Project::find($id);
        $project->title                 = $request->title;
        $project->slug                  = $request->slug;
        $project->description           = $request->description;
        $project->service_id            = $request->service;
        $project->status                = isset($request->status) ? true : false;
        $project->client_name           = $request->client_name;
        $project->creating_date         = $request->creating_date;
        $project->meta_title            = $request->meta_title;
        $project->meta_description      = $request->meta_description;
        $project->meta_keywords         = isset($request->meta_keywords) ? $this->generate_tags($request->meta_keywords) : null;
        $project->tools_used            = isset($request->tools_used) ? $this->generate_tags($request->tools_used) : null;
        $project->working_process       = count($request->process_title) > 0 ? $this->generate_json([$request->process_title, $request->process_description], ['title', 'description']) : null;

        if ($request->hasFile('featured_image')) {
            $project->featured_image_id = $this->single_upload($request->file('featured_image'), 'projects', $project->featured_image_id);
        }
        if ($request->hasFile('banner_image_1')) {
            $project->banner_image_1 = $this->single_upload($request->file('banner_image_1'), 'projects', $project->banner_image_1);
        }
        if ($request->hasFile('banner_image_2')) {
            $project->banner_image_2 = $this->single_upload($request->file('banner_image_2'), 'projects', $project->banner_image_2);
        }
        if ($request->hasFile('banner_image_3')) {
            $project->banner_image_3 = $this->single_upload($request->file('banner_image_3'), 'projects', $project->banner_image_3);
        }
        $project->save();

        return Redirect::route('projects.index')->with('success', 'Project was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project->featured_image_id !== null) {
            $this->single_upload_destroy($project->featured_image_id);
        }
        if ($project->banner_image_1 !== null) {
            $this->single_upload_destroy($project->banner_image_1);
        }
        if ($project->banner_image_2 !== null) {
            $this->single_upload_destroy($project->banner_image_2);
        }
        if ($project->banner_image_3 !== null) {
            $this->single_upload_destroy($project->banner_image_3);
        }
        $project->delete();
        return Redirect::back()->with('success', 'Project was successfully deleted!');
    }
}
