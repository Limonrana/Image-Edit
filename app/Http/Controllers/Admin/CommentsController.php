<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('admin.pages.blog.comments', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $comment = Comment::with([
            'post' => function ($query) {
                $query->select('id', 'title', 'featured_image')->with([
                    'image' => function ($query) {
                        $query->select('id', 'path');
                    },
                ]);
            },
            'user' => function ($query) {
                $query->select('id', 'profile_photo_path');
            }
        ])->find($id);
        return response()->json($comment);
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
            'comment_id'      => 'required',
        ]);

        $comment = Comment::find($request->comment_id);
        $comment->status = !$comment->status;
        $comment->save();
        return Redirect::back()->with('success', 'Comment was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return Redirect::back()->with('success', 'Comment was successfully deleted!');
    }
}
