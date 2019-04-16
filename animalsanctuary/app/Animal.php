<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * The Animal model.
 */
class Animal extends Model
{
  // Set which attributes can be applied to the animal model
    protected $fillable = ['name', 'dob', 'description', 'picture', 'availability'];
}
