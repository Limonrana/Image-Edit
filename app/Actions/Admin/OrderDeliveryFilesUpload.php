<?php

namespace App\Actions\Admin;

use App\Models\Deliverfile;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class OrderDeliveryFilesUpload
{
    /**
     * Upload the specified image in storage.
     *
     * @param  array  $file
     * @return \Illuminate\Http\Response
     */
    public static function upload($file, $user_id, $order_id)
    {
        $file_original_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_original_name,PATHINFO_FILENAME);
        $image_name = $fileName. '-' .time(). '.' . $file->getClientOriginalExtension();
        $directory = public_path('uploads/orders/delivery/' . $user_id);
        // Check if directory exists else create one
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        // resizing an uploaded file
        $file->move($directory, $image_name);
//        Image::make($file)->save(public_path('uploads/orders/delivery/' . $image_name));
        // Insert Image Path To Database
        $upload             = new Deliverfile();
        $upload->user_id    = $user_id;
        $upload->order_id   = $order_id;
        $upload->name       = $image_name;
        $upload->size       = '2012';  //$file->getSize();
        $upload->type       = 'image/jpeg'; // $file->getMimeType();
        $upload->path       = "uploads/orders/delivery/{$user_id}/" . $image_name;
        $upload->save();

        return $upload->id;
    }
}
