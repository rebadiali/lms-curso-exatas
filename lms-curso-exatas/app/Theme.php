<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'theme',
        'course_id'
    ];

    public function Questions(){
        return $this->belongsToMany("App\Question");
    }
}
