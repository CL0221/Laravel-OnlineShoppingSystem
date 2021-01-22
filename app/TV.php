<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TV extends Model
{
    protected $table = "t_v_s";

    public function brand()
    {
        $this->belongsToMany('App\Brand');
    }
}
