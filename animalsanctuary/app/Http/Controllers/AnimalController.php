<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {

    public function show($id) {
      $animal = Animal::find($id);
      return view('show', array('animal' => $animal));
    }

    public function listAll() {
      return view('listAll', array('animals'=>Animal::all()));
    }

    public function display() {
      $animal = App\Animal::all();
      if(Gate::denies('displayall')) {
        $animalQuery=$animalQuery->where('id', auth()->user()->id);
      }
      return view('/display', array('animals'=>$animalQuery));
    }
}
