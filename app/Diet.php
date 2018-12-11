<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public function photos()
    {
        return $this->belongsToMany('App\Photo')->withTimestamps();
    }
    public static function getForCheckboxes()
    {
        $diets = self::orderBy('name')->get();
        $dietsForCheckboxes = [];
        foreach ($diets as $diet) {
            $dietsForCheckboxes[$diet['id']] = $diet->name;
        }
        return $dietsForCheckboxes;
    }
}
