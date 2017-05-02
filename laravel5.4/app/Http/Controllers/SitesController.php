<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    //
    public function index()
    {
        return "hello world";
    }

    public function about()
    {
        $first = '高永立';
        return view('sites.about', compact('first'));
    }
}
