<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
   public function index($slug)
   {
       return view('pages.tour');
   }

   public function detail_tour($slug)
   {
       return view('pages.detail_tour');
   }
}
