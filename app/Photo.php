<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
    public function diets()
    {
        return $this->belongsToMany('App\Diet')->withTimestamps();
    }
}
