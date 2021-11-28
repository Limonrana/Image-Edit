<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Service;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.pages.service.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $collections = Collection::all();
        return view('admin.pages.service.add-services', compact('collections'));
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
            'title' => 'required|max:255|unique:services',
            'slug' => 'required|max:255|unique:services',
            'icon' => 'required|max:45',
            'collection' => 'required',
            'featured_image' =>'required|image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_1' =>'required|image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_2' =>'required|image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->collection_id = $request->collection;
        $service->status = isset($request->status) ? true : false;
        $service->meta_title = $request->meta_title;
        $service->meta_description = $request->meta_description;
        $service->faqs = count($this->generate_faqs($request->questions, $request->answers)) > 0 ? json_encode($this->generate_faqs($request->questions, $request->answers)) : null;
        $service->meta_keywords = isset($request->meta_keywords) ? json_encode($this->generate_tags($request->meta_keywords)) : null;
        $service->featured_image_id = $request->hasFile('featured_image') ? $this->upload_image($request->file('featured_image')) : null;
        $service->banner_image_1 = $request->hasFile('banner_image_1') ? $this->upload_image($request->file('banner_image_1')) : null;
        $service->banner_image_2 = $request->hasFile('banner_image_2') ? $this->upload_image($request->file('banner_image_2')) : null;
        $service->save();

        return Redirect::route('service.index')->with('success', 'Service was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $service = Service::find($id);
        $service->status = !$service->status;
        $service->save();
        return Redirect::route('service.index')->with('success', 'Service status was updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $collections = Collection::all();
        return view('admin.pages.service.edit-services', compact('service', 'collections'));
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
            'title' => 'required|max:255|unique:services,title,'.$id,
            'slug' => 'required|max:255|unique:services,slug,'.$id,
            'icon' => 'required|max:25',
            'collection' => 'required',
            'featured_image' =>'image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_1' =>'image|max:2048|mimes:png,jpeg,jpg',
            'banner_image_2' =>'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $service = Service::find($id);
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->collection_id = $request->collection;
        $service->status = isset($request->status) ? true : false;
        $service->meta_title = $request->meta_title;
        $service->meta_description = $request->meta_description;
        if (count($this->generate_faqs($request->questions, $request->answers)) > 0) {
            $service->faqs = json_encode($this->generate_faqs($request->questions, $request->answers));
        }
        if (isset($request->meta_keywords)) {
            $service->meta_keywords = json_encode($this->generate_tags($request->meta_keywords));
        }
        if ($request->hasFile('featured_image')) {
            $service->featured_image_id = $this->upload_image($request->file('featured_image'), $service->featured_image_id);
        }
        if ($request->hasFile('banner_image_1')) {
            $service->banner_image_1 = $this->upload_image($request->file('banner_image_1'), $service->banner_image_1);
        }
        if ($request->hasFile('banner_image_2')) {
            $service->banner_image_2 = $this->upload_image($request->file('banner_image_2'), $service->banner_image_2);
        }
        $service->save();

        return Redirect::route('service.index')->with('success', 'Service was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if ($service->featured_image_id !== null) {
            $old_upload = Upload::find($service->featured_image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        if ($service->banner_image_1 !== null) {
            $old_upload = Upload::find($service->banner_image_1);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        if ($service->banner_image_2 !== null) {
            $old_upload = Upload::find($service->banner_image_2);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $service->delete();
        return Redirect::route('service.index')->with('success', 'Service was successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function allDestroy(Request $request)
    {
//        dd($request->all());
//        $id = json_decode($request->id, true);
        return response()->json('DOne', 200);
    }

    /**
     * Upload the specified image in storage.
     *
     * @param  array  $file
     * @return \Illuminate\Http\Response
     */
    protected function upload_image($file, $image_id = null)
    {
        if ($image_id !== null) {
            $old_upload = Upload::find($image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $file_original_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_original_name,PATHINFO_FILENAME);
        $image_name = $fileName. '-' .time(). '.' . $file->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($file)->save(public_path('uploads/services/' . $image_name));
        // Insert Image Path To Database
        $upload = new Upload();
        $upload->name = $image_name;
        $upload->size = $file->getSize();
        $upload->type = $file->getMimeType();
        $upload->path = 'uploads/services/' . $image_name;
        $upload->save();

        return $upload->id;
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

    /**
     * Manage faq list from array to another array.
     *
     * @param  array  $questions
     * @param  array  $answers
     * @return array
     */
    protected function generate_faqs($questions, $answers)
    {
        $get_faq = [];
        foreach ($questions as $key => $question) {
            if (count($questions) !== $key + 1) {
                if (array_key_exists($key, $answers)) {
                    $new_array = [
                        'question'  => $question,
                        'answer'    => $answers[$key]
                    ];
                    array_push($get_faq, $new_array);
                }
            }
        }
        return $get_faq;
    }
}
