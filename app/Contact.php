<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id' , 'title' , 'message' ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
