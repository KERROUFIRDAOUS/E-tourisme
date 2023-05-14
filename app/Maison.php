<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    protected $fillable = [
    'nombre_de_chambre',  'ville_id' ,  'surface', 'prix', 'chauffage', 'climatisation', 'content', 'image'];

    public function ville(){
        return $this->belongsTo("App\Ville" , 'ville_id');
    }
    public function logements(){
        return $this->hasMany(Logement::class);
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
