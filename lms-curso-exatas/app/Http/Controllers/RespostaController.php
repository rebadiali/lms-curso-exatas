<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Resposta;

class RespostaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resposta::all();
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
        return Resposta::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RespostaController  $RespostaController
     * @return \Illuminate\Http\Response
     */
    public function show(Resposta $Resposta)
    {
        return $Resposta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RespostaController  $RespostaController
     * @return \Illuminate\Http\Response
     */
    public function edit(Resposta $Resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RespostaController  $RespostaController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $Resposta)
    {
        return $Resposta->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RespostaController  $RespostaController
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespostaController $Resposta)
    {
        return $Resposta->delete() ? "Removido com sucesso" : "Erro na remoção";
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
			'resposta' => ['required', 'string', 'max:255'],
			'correto' => ['required', 'boolean']
			]);
    }
}
