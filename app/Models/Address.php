<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * This Model relationship with Country Model.
     *
     * @function belongsTo
     */
    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    /**
     * The Address that hasMany to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
