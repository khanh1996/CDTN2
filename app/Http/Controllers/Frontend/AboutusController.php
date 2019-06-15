<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    //
    public function getAboutus(){
        return view('frontend.aboutus');
    }
}
