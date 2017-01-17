<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth');
       
    }
}
