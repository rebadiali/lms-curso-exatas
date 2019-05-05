<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Question;

class QuestionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
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
        return Question::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionController  $QuestionController
     * @return \Illuminate\Http\Response
     */
    public function show(Question $Question)
    {
        return $Question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionController  $QuestionController
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $Question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionController  $QuestionController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $Question)
    {
        return $Question->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionController  $QuestionController
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionController $Question)
    {
        return $Question->delete() ? "Removido com sucesso" : "Erro na remoção";
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
			'tema_id' => ['required', 'integer', 'max:255'],
			'pergunta' => ['required', 'string', 'max:255']
			]);
    }
}
