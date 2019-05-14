<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Tema;

class TemaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tema::all();
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
        return Tema::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TemaController  $TemaController
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $Tema)
    {
        return $Tema;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TemaController  $TemaController
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $Tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemaController  $TemaController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $Tema)
    {
        return $Tema->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemaController  $TemaController
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemaController $Tema)
    {
        return $Tema->delete() ? "Removido com sucesso" : "Erro na remoção";
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
            'name' => ['required', 'string', 'max:255'],
			]);
    }
}
