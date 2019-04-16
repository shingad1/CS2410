<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagecontroller extends Controller
{
  /**
   * Returns the index view
   * @return The index view - index.blade.php
   */
    public function index() {
      return view('index');
    }
}
