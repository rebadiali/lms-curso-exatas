<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'theme'
    ];

    public function Questions(){
        return $this->belongsToMany("App\Question");
    }
}
