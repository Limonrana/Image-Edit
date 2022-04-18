<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'delivered' => 'datetime',
        'delivery_accepted' => 'datetime',
    ];

    /**
     * This Model relationship with order_details Model.
     *
     * @function belongsTo
     */
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * This Model relationship with Upload Files Model.
     *
     * @function belongsTo
     */
    public function upload_files()
    {
        return $this->hasMany(File::class);
    }

    /**
     * This Model relationship with Delivery Files Model.
     *
     * @function belongsTo
     */
    public function delivery_files()
    {
        return $this->hasMany(Deliverfile::class);
    }

    /**
     * This Model relationship with Order Model.
     *
     * @function belongsTo
     */
    public function complexity()
    {
        return $this->belongsTo('App\Models\Complexity', 'complexity_id');
    }

    /**
     * This Model relationship with Order Model.
     *
     * @function belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
