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
        return $theme;
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
     * @param  \App\Theme  $ThemeController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        return $theme->delete() ? "Removido com sucesso" : "Erro na remoção";
    }

    /**
     * @param Theme $theme
     * @param $quantity
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getThemeQuestions (Theme $theme, $quantity)
    {
        return $theme->questions()->inRandomOrder()->take($quantity)->get();
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
            'theme' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);
    }
}
