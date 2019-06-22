<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify_User extends Model
{
	public $table = "Verify_Users";
    protected $fillable = [
        'user_id',
        'token'
    ];

}
