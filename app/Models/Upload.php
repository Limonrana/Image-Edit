<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    /**
     * This static function that are find upload path.
     *
     * @var array
     */
    public static function getImage($id, $default)
    {
        $upload = self::find($id);
        return isset($upload) ? $upload->path : $default;
    }
}
