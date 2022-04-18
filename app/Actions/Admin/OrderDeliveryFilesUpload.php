<?php

namespace App\Actions\Admin;

use App\Models\Deliverfile;
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
        // resizing an uploaded file
        Image::make($file)->save(public_path('uploads/orders/delivery/' . $image_name));
        // Insert Image Path To Database
        $upload             = new Deliverfile();
        $upload->user_id    = $user_id;
        $upload->order_id   = $order_id;
        $upload->name       = $image_name;
        $upload->size       = $file->getSize();
        $upload->type       = $file->getMimeType();
        $upload->path       = 'uploads/orders/delivery/' . $image_name;
        $upload->save();

        return $upload->id;
    }
}
