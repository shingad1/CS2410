<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

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
      $animalsQuery = Animal::all();
      return view('/home', array('animals'=>$animalsQuery));
      //return view('home');
    }
    /**
     * Returns the requested view.
     * @return Requested.blade.php view
     */
    public function requested() {
      return view('requested');
    }

}
