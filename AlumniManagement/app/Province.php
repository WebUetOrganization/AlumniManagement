<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //tao lien ket 1-n voi bang alumni, n sinh vien - 1 tinh
    public function alumni(){
        return $this->hasMany('App\Alumni');
    }
}
