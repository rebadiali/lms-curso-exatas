<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Answer;

class AnswerController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Answer::all();
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
        return Answer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return $answer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        return $Answer->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        return $answer->delete() ? "Removido com sucesso" : "Erro na remoção";
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
			'question_id' => ['required', 'integer', 'max:255'],
			'answer' => ['required', 'string', 'max:255'],
			'is_correct' => ['required', 'boolean']
		]);
    }
}