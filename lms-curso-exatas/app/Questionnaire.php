<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'professor_id','course_id',
    ];

    public function Themes(){
        return $this->belongsToMany("App\Theme")
            ->withPivot("quantity")
            ->with('questions');
    }
}
