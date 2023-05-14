<?php

namespace App\Http\Controllers;

use App\Ville;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $villes = Ville::skip(1)->take(3)->get();
        return view('home',compact('villes'));
    }
}
