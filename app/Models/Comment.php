<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Blog Model.
     *
     * @function belongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
