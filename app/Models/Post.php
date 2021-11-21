<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Upload Model.
     *
     * @function belongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Upload', 'featured_image');
    }

    /**
     * This Model relationship with Category Model.
     *
     * @function belongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * This Model relationship with Tags Model.
     *
     * @function belongsTo
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'posttags')->withTimestamps();
    }
}
