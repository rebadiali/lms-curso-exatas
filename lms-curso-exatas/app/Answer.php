<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $table = "answers";

    protected $fillable = [
        'questionnaire_id','question_id','alternative_id','student_id',
    ];

    /**
     * Get the comments for the blog post.
     */
//    public function alternatives()
//    {
//        return $this->hasMany('App\Alternative');
//    }
}
