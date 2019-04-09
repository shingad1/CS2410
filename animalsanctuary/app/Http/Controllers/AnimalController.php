<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    public function show($id) {
      $animal = Animal::find($id);
      return view('show', array('animal' => $animal));
    }

    public function listAll() {
      return view('listAll', array('animals'=>Animal::all()));
    }
}
