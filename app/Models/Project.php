<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'description',
        'working_process',
        'tools_used',
        'creating_date',
        'client_name',
        'featured_image_id',
        'banner_image_1',
        'banner_image_2',
        'banner_image_3',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    /**
     * This Model relationship with Collection Model.
     *
     * @function belongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    /**
     * This Model relationship with Upload Model For Featured Image.
     *
     * @function belongsTo
     */
    public function featured_image()
    {
        return $this->belongsTo(Upload::class);
    }

    /**
     * This Model relationship with Upload Model For Banner Image 1.
     *
     * @function belongsTo
     */
    public function b_image_1()
    {
        return $this->belongsTo('App\Models\Upload', 'banner_image_1');
    }

    /**
     * This Model relationship with Upload Model For Banner Image 2.
     *
     * @function belongsTo
     */
    public function b_image_2()
    {
        return $this->belongsTo('App\Models\Upload', 'banner_image_2');
    }

    /**
     * This Model relationship with Upload Model For Banner Image 3.
     *
     * @function belongsTo
     */
    public function b_image_3()
    {
        return $this->belongsTo('App\Models\Upload', 'banner_image_3');
    }
}
