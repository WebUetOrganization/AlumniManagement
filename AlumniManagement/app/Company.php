<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //tạo quan hệ n-n với bảng alumni, 1 cty có n sv và 1 sv có thể làm cho n cty
    public function alumni(){
        return $this->belongsToMany('App\Alumni');
    }
}
