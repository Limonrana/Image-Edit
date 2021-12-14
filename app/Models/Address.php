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
    public function get_country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    /**
     * This Model relationship with Country Model.
     *
     * @function belongsTo
     */
    public function get_state()
    {
        return $this->belongsTo(State::class, 'state');
    }

    /**
     * The Address that hasMany to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
