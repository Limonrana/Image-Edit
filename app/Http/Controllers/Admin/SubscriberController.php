<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.pages.common.subscribers', compact('subscribers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $subscriber             = Subscriber::findOrFail($id);
        $subscriber->status     = !$subscriber->status;
        $subscriber->save();
        return Redirect::back()->with('success', 'Subscriber status was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Subscriber::destroy($id);
        return Redirect::back()->with('success', 'Subscriber was successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  array  $ids
     * @return \Illuminate\Http\JsonResponse
     */
    public function allDestroy(Request $request)
    {
//        foreach ($ids as $id) {
//            Subscriber::destroy($id);
//        }
        return response()->json(['status' => $request->subscribersId, 'success' => 'Subscribers were successfully deleted!'], 200);
    }
}
