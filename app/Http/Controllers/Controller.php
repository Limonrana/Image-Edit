<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Upload;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Upload the specified image in storage.
     *
     * @param  array  $file
     * @return \Illuminate\Http\Response
     */
    protected function single_upload($file, $folder, $image_id = null)
    {
        if ($image_id !== null) {
            $old_upload = Upload::find($image_id);
            // Delete Image from Folder
            unlink($old_upload->path);
            $old_upload->delete();
        }
        $file_original_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_original_name,PATHINFO_FILENAME);
        $image_name = $fileName. '-' .time() .'-' . Str::random(20). '.' . $file->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($file)->save(public_path('uploads/' . $folder .'/' . $image_name));
        // Insert Image Path To Database
        $upload = new Upload();
        $upload->name = $image_name;
        $upload->size = $file->getSize();
        $upload->type = $file->getMimeType();
        $upload->path = 'uploads/' . $folder . '/' . $image_name;
        $upload->save();

        return $upload->id;
    }

    /**
     * Upload the specified image in storage.
     *
     * @param  array  $file
     * @return \Illuminate\Http\Response
     */
    protected function user_single_upload($file)
    {
        $file_original_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_original_name,PATHINFO_FILENAME);
        $image_name = $fileName. '-' .time(). '.' . $file->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($file)->save(public_path('uploads/users/' . $image_name));
        // Insert Image Path To Database
        $upload             = new File();
        $upload->user_id    = Auth::id();
        $upload->name       = $image_name;
        $upload->size       = $file->getSize();
        $upload->type       = $file->getMimeType();
        $upload->path       = 'uploads/users/' . $image_name;
        $upload->save();

        return $upload->id;
    }

    /**
     * Remove the specified upload resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function single_file_destroy($id)
    {
        $old_upload = File::find($id);
        // Delete Image from Folder
        if (isset($old_upload)) {
            unlink($old_upload->path);
            $old_upload->delete();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove the specified upload resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function single_upload_destroy($id)
    {
        $old_upload = Upload::find($id);
        // Delete Image from Folder
        if (isset($old_upload)) {
            unlink($old_upload->path);
            $old_upload->delete();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove the specified upload resource from storage.
     *
     * @param  array  $files
     * @return bool
     */
    public function multiple_file_destroy($files)
    {
        foreach ($files as $file) {
            $old_upload = File::find($file['id']);
            // Delete Image from Folder
            if (isset($old_upload)) {
                unlink($old_upload->path);
                $old_upload->delete();
            }
        }
        return true;
    }

    /**
     * Manage generate_json list from array to another array.
     *
     * @param  array  $multi_array
     * @param  array  $keys
     * @return array|false|string
     */
    protected function generate_json($multi_array, $keys)
    {
        $generate_array = [];
        foreach ($multi_array as $k => $single_array) {
            foreach ($single_array as $key => $value) {
                if ($value !== null) {
                    if ($k === 0) {
                        $manage_array = [];
                        $manage_array[$keys[$k]] = $value;
                        array_push($generate_array, $manage_array);
                    } else {
                        $generate_array[$key][$keys[$k]] = $value;
                    }
                }
            }
        }
        return json_encode($generate_array);
    }

    /**
     * Manage generate_json list from array to another array.
     *
     * @param  array  $array
     * @param  array  $replace_value
     * @return array|false|string
     */
    protected function generate_page_option($array, $replace_value = [])
    {
        $generate_array = [];
        $arr_new = array_replace($array, $replace_value);
        // Unset Unused Array Key
        if (array_key_exists('_method', $arr_new)) {
            unset($arr_new['_method']);
        }
        if (array_key_exists('_token', $arr_new)) {
            unset($arr_new['_token']);
        }

        // Filtering array
        foreach ($arr_new as $key => $value) {
            if ($value !== null) {
                $generate_array[$key] = $value;
            }
        }
        return json_encode($generate_array);
    }

    /**
     * Manage tag list from json to array.
     *
     * @param  array  $tags
     * @return array|false|string
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
        return json_encode($new_meta_keywords);
    }

    /**
     * generate_modal_tags the specified resource.
     *
     * @param  array  $old_tags
     * @param  array  $new_tags
     * @return array
     */
    protected function generate_modal_tags($old_tags, $new_tags)
    {
        $new_meta_keywords = [];
        if (isset($new_tags)) {
            $keywords = json_decode($new_tags, true);
            foreach ($keywords as $keyword) {
                array_push($new_meta_keywords, $keyword['value']);
            }
        }
        $meta_keywords = [];
        $array_old_tags = json_decode($old_tags, true);
        foreach ($new_meta_keywords as $key => $tag) {
            $find_single_old_tag = array_search($tag, $array_old_tags);
            if ($find_single_old_tag === false) {
                array_push($meta_keywords, $tag);
            }
        }
        return array_merge($meta_keywords, $array_old_tags);
    }
}
