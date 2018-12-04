<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = "survey";

    public function question() {
        return $this->hasMany('App\Question');
    }
}
