<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class QuestionnaireByCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseid = $request->course_id;
        $result = Questionnaire::all()->where('course_id','=',$courseid);

        return $result;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()){
            return response()->json($validation->errors(), 422);
        }
        $questionnaire = Questionnaire::create($request->all());
        $themes = $questionnaire->themes();

        foreach ($request->number_of_questions as $index => $item) {
            $themes->attach([$item["theme_id"]=> ["quantity" => $item["quantity"]]]);
        }
        return $questionnaire;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->themes;
        $themes = $questionnaire->themes()->get();
        $themesArray = $themes->toArray();
        $questionnaire = $questionnaire->toArray();

        foreach ($themes as $index => $theme) {

            $questions = $theme->questions()->inRandomOrder()->take($theme->pivot->quantity)->get();

            foreach ($questions as $question) {
                $question->alternatives;
            }

            $themesArray[$index]['questions'] = $questions;
        }

        $questionnaire['themes'] = $themesArray;

        return $questionnaire;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        return $questionnaire->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        return $questionnaire->delete() ? "Removido com sucesso" : "Erro na remoção";
    }

    protected function validator(array $data)
    {
        $professorId = $data["professor_id"];

        return Validator::make($data, [
            'professor_id' => [
                'required',
                Rule::exists('users', 'id')
                ->where(function ($query) use ($professorId)
                {
                    $query
                        ->where("id",$professorId)
                        ->where('user_type',User::PROFESSOR);
                }),
            ],
            'course_id' => ['required'],
            'name' => ['required']
        ]);
    }
}
