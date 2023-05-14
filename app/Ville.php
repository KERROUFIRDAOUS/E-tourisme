<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'name', 'content','image'
    ];

    public function hotel(){
        return $this->hasMany("App\Hotel");
    }

    public function maison(){
        return $this->hasMany("App\Maison");
    }
}
