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
        $first = 'YongLiGao';
        $people = [
             'gaoyongli',
             'yongligao',
             'YongLiGao'
        ];
        $p = [];
        return view('sites.about', compact('first','people','p'));
    }

    public function contact()
    {
            return view('Sites.contact');
    }
}
