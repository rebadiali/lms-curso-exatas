<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
 	public $table = "CourseResposta";
	
    protected $fillable = [
        'question_id','answer','is_correct'
    ];
}

