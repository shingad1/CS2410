<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'firstname', 'lastname', 'email', 'address', 'postcode', 'password', 'contact number', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns a boolean value based on whether the user is an admin or not
     */
    public function isAdmin() {
      if ($this->role) {
        return true;
      }
      return false;
    }
}
