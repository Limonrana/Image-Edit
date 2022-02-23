<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Blogs Model.
     *
     * @function belongsTo
     */
    public function blogs()
    {
        return $this->belongsToMany('App\Models\Post', 'posttags')->withTimestamps();
    }
}
