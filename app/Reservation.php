<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'hotel_id' , 'phone_id' , 'price' , 'valide' , 'rooms' , 'adults' , 'children' , 'checkin' , 'checkout'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Hotel()
    {
        return $this->belongsTo('App\hotel');
    }
}
