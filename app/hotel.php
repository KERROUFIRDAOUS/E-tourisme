<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $fillable = [
        'title', 'content','image','created_by',
    ];

    public function ville(){
        return $this->belongsTo("App\Ville");
    }


    public function user(){
        return $this->belongsTo("App\User");
    }

}
