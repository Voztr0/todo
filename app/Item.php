<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nombre', 'estado','folder_id',
        ];

    //Relación de 1:n 
    public function folder(){
        return $this->belongsTo(Folder::class);
    }
}
