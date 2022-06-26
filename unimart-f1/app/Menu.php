<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'name','slug','parent_id',
    ];
    function menu_children(){
        return $this->hasMany(Menu::class,'parent_id');
    }
}
