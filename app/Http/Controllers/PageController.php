<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function services(){
        return view('frontend.pages.services');
    }
    public function pricing(){
        return view('frontend.pages.pricing');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
}
