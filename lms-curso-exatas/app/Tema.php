<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
	public $table = "CourseTemas";
	
    protected $fillable = [
        'name'
    ];
}
