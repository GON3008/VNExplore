<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
//        return view('clients.pages.layouts.home');
        return view('clients.tests.home');
    }
}
