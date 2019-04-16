<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Animal;
use App\Adoption;
use App\User;

//Animal Controller, which provides the functionality for creating, storing, updating, displaying an animal.
class AnimalController extends Controller {

/**
 * The display function returns a view called display, passing in the required attributes for that view.
 * @return Returns a view which contains an array of the required attributes to display an animal
 */
    public function display(Request $request)  {
      $filter = $request->input("filter");
      $requested = false;
      $animalsQuery = Animal::all();
      $userId = \Auth::user()->id;
      $adoptionsQuery = Adoption::all();
      return view('/display', array('animals'=>$animalsQuery,
                                    'userId'=>$userId,
                                    'adoptions'=>$adoptionsQuery,
                                    'requested'=>$requested,
                                    'filter'=>$filter));
     }

/**
 * Return the create.blade.php view found in the animals folder.
 * @return View called create.blade.php.
 */
    public function create() {
      return view('animals.create');
    }

/**
 * Store the animal into the databasee using $request.
 * @param Gets the various attributes of the animal using the $request parameter.
 * @return Returns the text 'succcess' following 'Animal has been added'
 */

  public function store(Request $request) {
  // form validation
  $animal = $this->validate(request(), [
    'name' => 'required',
    'DOB' => 'required',
    'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
    'type' => 'required',
  ]);
  //Handles the uploading of the image
  if ($request->hasFile('picture')){
    //Gets the filename with the extension
    $fileNameWithExt = $request->file('picture')->getClientOriginalName();
    //just gets the filename
    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //Just gets the extension
    $extension = $request->file('picture')->getClientOriginalExtension();
    //Gets the filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //Uploads the image
    $path = $request->file('picture')->storeAs('public/images', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';
  }
  // create a Animal object and set its values from the input
  $animal = new Animal; //if not work change to App\Animal
  $animal->description = $request->input('description');
  $animal->name = $request->input('name');
  $animal->DOB = $request->input('DOB');
  $animal->type = $request->input('type');
  $animal->picture = $fileNameToStore;
  $animal->availability = $request->input('availability');
  // save the Animal object
  $animal->save();
  // generate a redirect HTTP response with a success message
  return back()->with('success', 'Animal has been added');
}

/**
 * Used in the animals page. Passes in the various parameters used in the index.blade.php view found in animals folder.
 * @return A view called animals/index, having passed in the required attributes.
 */
public function index() {
    $animals = Animal::all();
    $users = User::all();
    $adoptions= Adoption::all();
    return view('animals.index', array('animals'=>$animals, 'users'=>$users, 'adoptions'=>$adoptions));
}

/**
 * View a particular users details, given their ID.
 * @param  The ID of the user.
 * @return Returns a user view
 */
public function viewuser($id) {
  $users = User::find($id);
  return view('/user', compact('users'));
}

/**
 * Show an animals details
 * @param  The ID of the animal
 * @return The show.blade.php view of the animal
 */
public function show($id) {
  $animal = Animal::find($id);
  return view('animals.show', compact('animal'));
}

/**
 * Delete an animal
 * @param  the ID of the animal
 * @return Redirects the user to the animals page, with text 'Success', 'Animal has been deleted'
 */
public function destroy($id){
  $animal = Animal::find($id);
  $animal->delete();
  $adoptions = Adoption::where('animalId', '=', $id);
  $adoptions->delete();
  return redirect('animals')->with('success','Animal has been deleted');
}

/**
 * Updates the details of an animal; subsequently updates the database.
 * @param  Request $request The animal object itself; can retrieve the animal parameters from here.
 * @param  $id     The ID of the animal to modify.
 * @return Returns back to the animals page, having updated the animal.
 */
public function update(Request $request, $id){
  $animal = Animal::find($id);
  $this->validate(request(), [
    'name' => 'required',
    'DOB' => 'required',
    'type' => 'required',
    //'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500'
  ]);
  $animal->name = $request->input('name');
  $animal->description = $request->input('description');
  $animal->DOB = $request->input('DOB');
  $animal->type = $request->input('type');
  $animal->availability = $request->input('availability');
  //$animal->picture = $request->input('daily_rate');
  //$animal->updated_at = now();
  //Handles the uploading of the image
  if ($request->hasFile('picture')){
    //Gets the filename with the extension
    $fileNameWithExt = $request->file('picture')->getClientOriginalName();
    //just gets the filename
    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //Just gets the extension
    $extension = $request->file('picture')->getClientOriginalExtension();
    //Gets the filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //Uploads the image
    $path = $request->file('picture')->storeAs('public/images', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';
  }
  $animal->picture = $fileNameToStore;
  $animal->save();
  return redirect('animals')->with('success','Animal has been updated');
}

/**
 * Edit the animal, given it's ID.
 * @param  $id the ID of the animal to edit.
 * @return Return a view containing the animals details- edit.blade.php found in the animal folder.
 */
public function edit($id) {
  $animal = Animal::find($id);
  return view('animals.edit',compact('animal'));
}
}
