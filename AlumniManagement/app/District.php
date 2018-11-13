<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name'];
    //tao lien ket 1-n voi bang alumni, n sinh vien - 1 huyen
    public function alumni(){
        return $this->hasMany('App\Alumni');
    }
}
