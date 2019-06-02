<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
 	public $table = "alternatives";
	
    protected $fillable = [
        'question_id',
        'alternative',
        'is_correct'
    ];
}

