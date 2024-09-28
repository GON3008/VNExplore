<?php

namespace App\Http\Controllers;

use App\Models\HotelLocation;
use App\Models\HotelServices;
use App\Models\ListCategories;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class CategoriesController extends Controller
{
    public function index(){
        $listCategories = ListCategories::all();
        $hotelLocations = HotelLocation::all();
        $hotelServices = HotelServices::all();
        return view ('admin.categories.index', compact('listCategories','hotelLocations','hotelServices'));
    }
}
