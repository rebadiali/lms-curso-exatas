<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public $table = "CourseQuestion";
	
    protected $fillable = [
        'tema_id','pergunta',
    ];
}
