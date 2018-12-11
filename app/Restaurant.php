<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function photos() {
        return $this->hasMany('App\Photos');
    }
    public static function getForDropdown() {
        return self::select(['id', 'name'])->get();
    }
    public function cuisines()
    {
        return $this->belongsToMany('App\Cuisine')->withTimestamps();
    }        
}
