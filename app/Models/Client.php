<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'image_id',
        'status',
    ];

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
