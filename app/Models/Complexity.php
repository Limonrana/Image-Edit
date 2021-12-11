<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complexity extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Upload Model.
     *
     * @function belongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Upload', 'image_id');
    }
}
