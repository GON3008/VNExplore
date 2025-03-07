<?php

namespace App\Http\Controllers\Admin;

class TestController extends Controller
{
    public function index()
    {
        return view ('admin.test.index');
    }

}
