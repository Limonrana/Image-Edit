<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $blogs = Post::latest()->get();
        return view('admin.pages.blog.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.pages.blog.add-blog', compact('categories', 'tags'));
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
            'title' => 'required|max:255|unique:posts',
            'slug' => 'required|max:255|unique:posts',
            'category' => 'required',
            'featured_image' =>'required|image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $post                       = new Post();
        $post->title                = $request->title;
        $post->slug                 = $request->slug;
        $post->description          = $request->description;
        $post->category_id          = $request->category;
        $post->status               = isset($request->status) ? true : false;
        $post->views                = 0;
        $post->meta_title           = $request->meta_title;
        $post->meta_description     = $request->meta_description;
        $post->meta_keywords        = isset($request->meta_keywords) ? json_encode($this->generate_tags($request->meta_keywords)) : null;
        $post->featured_image       = $request->hasFile('featured_image') ? $this->upload_image($request->file('featured_image')) : null;
        $post->save();

        $post->tags()->sync($request->tags);

        return Redirect::route('blogs.index')->with('success', 'Blog was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $blog           = Post::find($id);
        $blog->status   = !$blog->status;
        $blog->save();
        return Redirect::route('blogs.index')->with('success', 'Blog status was updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $blog = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.pages.blog.edit-blog', compact('blog', 'tags', 'categories'));
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
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'slug' => 'required|max:255|unique:posts,slug,'.$id,
            'category' => 'required',
            'featured_image' =>'image|max:2048|mimes:png,jpeg,jpg',
        ]);

        $post                       = Post::find($id);
        $post->title                = $request->title;
        $post->slug                 = $request->slug;
        $post->description          = $request->description;
        $post->category_id          = $request->category;
        $post->status               = isset($request->status) ? true : false;
        $post->meta_title           = $request->meta_title;
        $post->meta_description     = $request->meta_description;
        if (isset($request->meta_keywords)) {
            $post->meta_keywords = json_encode($this->generate_tags($request->meta_keywords));
        }
        if ($request->hasFile('featured_image')) {
            $post->featured_image = $this->upload_image($request->file('featured_image'), $post->featured_image);
        }
        $post->save();

        $post->tags()->sync($request->tags);

        return Redirect::route('blogs.index')->with('success', 'Blog was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        if ($post->featured_image !== null) {
            $old_upload = Upload::find($post->featured_image);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $post->delete();
        return Redirect::route('blogs.index')->with('success', 'Blog was successfully deleted!');
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
        Image::make($file)->save(public_path('uploads/blogs/' . $image_name));
        // Insert Image Path To Database
        $upload = new Upload();
        $upload->name = $image_name;
        $upload->size = $file->getSize();
        $upload->type = $file->getMimeType();
        $upload->path = 'uploads/blogs/' . $image_name;
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
}
