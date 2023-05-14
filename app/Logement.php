<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    protected $fillable = [
    'user_id', 'maison_id' , 'body' , 'checkin' , 'checkout'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Maison()
    {
        return $this->belongsTo(Maison::class);
    }
}
