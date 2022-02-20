<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Review;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reviews = Review::latest()->get();
        $total_rating = 0;
        $total_reviews = count($reviews);
        $review_count = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        foreach ($reviews as $review) {
            if ($review->rating == 1) {
                $review_count[1] = $review_count[1] + 1;
            } elseif ($review->rating == 2) {
                $review_count[2] = $review_count[2] + 1;
            } elseif ($review->rating == 3) {
                $review_count[3] = $review_count[3] + 1;
            } elseif ($review->rating == 4) {
                $review_count[4] = $review_count[4] + 1;
            } elseif ($review->rating == 5) {
                $review_count[5] = $review_count[5] + 1;
            }
            //
            $total_rating = $total_rating + $review->rating;
        }
        // Find Review Percents
        $review_percent = floatval($total_rating / $total_reviews);
        return view('admin.pages.review.reviews', compact('reviews', 'review_count', 'review_percent', 'total_reviews'));
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
            'name'          => 'required|max:255',
            'position'      => 'required|max:255',
            'company'       => 'required|max:255',
            'comment'       => 'required',
            'rating'         => 'required',
            'status'        => 'required',
            'image'         => 'required|image|max:2048|mimes:png,jpeg,jpg|dimensions:min_width=89,min_height=89|dimensions:max_width=150,max_height=150',
        ]);

        if ($request->hasFile('image')) {
            $upload = $this->single_upload($request->file('image'), 'reviews');
        }

        $review             = new Review();
        $review->name       = $request->name;
        $review->position   = $request->position;
        $review->company    = $request->company;
        $review->rating     = intval($request->rating);
        $review->comment    = $request->comment;
        $review->status     = $request->status;
        $review->image_id   = isset($upload) ? $upload : null;
        $review->save();
        return Redirect::back()->with('success', 'Review was successfully added!');
    }

    /**
     * Display the specified single project resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $review             = Review::find($id);
        $review->status     = !$review->status;
        $review->save();
        return Redirect::back()->with('success', 'Review status was successfully updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $review = Review::with('image')->find($id);
        return response()->json($review);
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
            'name'          => 'required|max:255',
            'position'      => 'required|max:255',
            'company'       => 'required|max:255',
            'comment'       => 'required',
            'rating'        => 'required',
            'status'        => 'required',
            'image'         => 'image|max:2048|mimes:png,jpeg,jpg|dimensions:min_width=89,min_height=89|dimensions:max_width=150,max_height=150',
        ]);

        $review             = Review::find($request->id);
        $review->name       = $request->name;
        $review->position   = $request->position;
        $review->company    = $request->company;
        $review->rating     = intval($request->rating);
        $review->comment    = $request->comment;
        $review->status     = $request->status;
        if ($request->hasFile('image')) {
            $upload = $this->single_upload($request->file('image'), 'reviews', $review->image_id);
            $review->image_id   = isset($upload) ? $upload : null;
        }
        $review->save();
        return Redirect::back()->with('success', 'Review was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if ($review->image_id !== null) {
            $old_upload = Upload::find($review->image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $review->delete();
        return Redirect::back()->with('success', 'Review was successfully deleted!');
    }
}
