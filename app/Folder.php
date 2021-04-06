<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['nombre'];

    //Relación de 1:n 
    public function items(){
        return $this->hasMany(Item::class);
    }
}
