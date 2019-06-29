<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Answer;
use App\Question;
use App\Alternative;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questionnaireid = $request->questionnaire_id;
        $studentid = $request->student_id;
        $result = Answer::all()->where('questionnaire_id','=',$questionnaireid)->where('student_id','=',$studentid);
        $total = 0;
        $correct = 0;

        foreach( $result as $index){
           $total +=1;
           $if = Alternative::select('id')->where('is_correct','=','1')->where('question_id','=',$index->question_id)->first();
           if($if->id == $index->alternative_id){
               $correct +=1;
           }
        }
        $data = ["total" => $total, "correct" => $correct];

        return $data;

    }
}
