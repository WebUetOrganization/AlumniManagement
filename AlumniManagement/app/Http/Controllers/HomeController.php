<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 9/28/2018
 * Time: 12:24 PM
 */

namespace App\Http\Controllers;

use App\Alumni;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    //method demo
    public function show($id){
        return "user id ".$id;
    }
}