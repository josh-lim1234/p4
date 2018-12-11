<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    public function restaurant()
    {
        return $this->belongsToMany('App\Restaurant')->withTimestamps();
    }
    public static function getForCheckboxes()
    {
        $cuisines = self::orderBy('name')->get();
        $cuisinesForCheckboxes = [];
        foreach ($cuisines as $cuisine) {
            $cuisinesForCheckboxes[$cuisine['id']] = $cuisine->name;
        }
        return $cuisinesForCheckboxes;
    } 
}
