<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Theme;

class ThemeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Theme::all();
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
        return Theme::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThemeController  $ThemeController
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return $theme; //RETORNO ORIGINAL DA FUNÇÃO, O DE BAIXO É EXEMPLO DE PERGUNTAS
        //return $theme->questions()->inRandomOrder()->take(1)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThemeController  $ThemeController
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThemeController  $ThemeController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        return $theme->update($request->all()) ? "Atualizado com sucesso" : "Erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThemeController  $ThemeController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThemeController $theme)
    {
        return $theme->delete() ? "Removido com sucesso" : "Erro na remoção";
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
