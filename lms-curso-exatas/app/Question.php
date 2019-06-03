<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public $table = "questions";
	
    protected $fillable = [
        'question',
    ];

    public function Themes(){
        return $this->belongsToMany("App\Theme");
    }

    /**
     * Get the comments for the blog post.
     */
    public function alternatives()
    {
        return $this->hasMany('App\Alternative');
    }
}
