<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $primaryKey = 'idCategorie';

    protected $guarded = [];
    //
    public function oeuvres(){
        return $this->hasMany(Oeuvre::class, 'idCategorie','idCategorie');
    }}
