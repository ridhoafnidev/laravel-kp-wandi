<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Reklame;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hitunguser = User::count();
        $hitungreklame = Reklame::count();
        $hitungreklame2 = Reklame::count();
        return view('home',compact('hitunguser','hitungreklame','hitungreklame2'));
    }

    
}
