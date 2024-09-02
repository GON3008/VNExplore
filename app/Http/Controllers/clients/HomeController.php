<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
//        return view('clients.pages.layouts.home');
        return view('clients.home.index');
    }
}
