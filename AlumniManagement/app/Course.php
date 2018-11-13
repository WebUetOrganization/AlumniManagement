<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['school', 'name', 'note'];
    //tao lien ket 1-n voi bang alumni, n sinh vien - 1 khoa hoc
    public function alumni(){
        return $this->hasMany('App\Alumni');
    }
}
