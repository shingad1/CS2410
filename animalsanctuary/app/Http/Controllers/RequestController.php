<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Adoption;
use App\User;
use Auth;

/**
 * Handles the functionality of requests and adoptions.
 */
class RequestController extends Controller
{

    /**
     * Show the form for creating a new Animal.
     * @param $id The id of the animal.
     * @return edit.blade.php which contains the animals details
     */
    public function create($id)
    {
      $animals = Animal::find($id);
      return view('adoption_request.edit', compact('animals'));
    }

    /**
     * Returns the requested view
     * @return Requested.blade.php view
     */
    public function requested(){
      return view('requested');
    }

    /**
     * Store the adoption details into the database.
     * @param  Request $request The adoption parameter from which to get data
     * @return Response which indicates that the adoption request has been done correctly.
     */
    public function store(Request $request) {
      $adoption = $this->validate(request(), [
        'userId' => 'required',
        'animalId' => 'required',
        'name' => 'required'
      ]);

      $adoption = new Adoption;
      $adoption->userId = $request->input('userId');
      $adoption->animalId = $request->input('animalId');
      $adoption->name = $request->input('name');

      $adoption->save();
      return back()->with('success', 'Adoption request has been added');
    }

/**
 * Index the pending requests of the user
 * @return Returns the pending view, given the $adoptionsQuery and $animal
 */
  public function index() {
    $animal = Animal::all();
    $adoptionsQuery = Adoption::all();
    return view('adoption_request.pending',array('adoptions'=>$adoptionsQuery, 'animals'=>$animal));
  }

/**
 * Update the adoption request of an animal; set whether it has been accepted or requested.
 * @param  Request $request To get the adoption details
 * @param  Bigint(20) $id   Get the specific adoption given this id
 * @param  Animal  $animal  The animal to be adopted.
 * @return Response which indicates that the animal adoption request has been updated successfully.
 */
  public function update(Request $request, $id, Animal $animal)
  {
    $animal = Animal::all();
    $adoption = Adoption::find($id);
    $animalId = $adoption->animalId;
    $this->validate(request(), [
      'adopted' => 'required',
    ]);
    $adoption->adopted = $request->input('adopted');
    $adoption->save();

    if ($adoption->adopted == 'accepted') {
      $other = Adoption::where("animalId", "=", $animalId)->where("adopted", "=", "pending")->get();

      foreach ($other as $record) {
        $record->status = 'rejected';
        $record->save();
      }
    }

    $animal = Animal::where("id", "=", $animalId)->first();
    $animal->availability = 'not available';
    $animal->save();

    return redirect('adoptions')->with('success','Adoption has been updated');
  }

/**
 * Get the requests of a particular user, given the $animalQuery, $userId, and $adoptionsQuery parameters.
 * @return A view userrequest.blade.php which displays the current status of all of the requests for that user.
 */
  public function user() {
    $animalsQuery = Animal::all();
    $userId = \Auth::user()->id;
    $adoptionsQuery = Adoption::all();
    return view('adoption_request.userrequest', array('animals'=>$animalsQuery, 'userId'=>$userId, 'adoptions'=>$adoptionsQuery));
  }
}
