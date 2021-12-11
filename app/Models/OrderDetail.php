<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Order Model.
     *
     * @function belongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
}
