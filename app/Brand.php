<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function tv()
    {
        $this->belongsToMany('App\TV');
    }
}
