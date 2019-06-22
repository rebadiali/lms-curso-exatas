<?php

namespace App\Http\Controllers;
use App\Verify_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;

class VerifyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()){
            return response()->json($validation->errors(), 422);
        }

        $token = $request->token;
        
        if(Verify_User::all()->where('token','=',$token)->count() == 1){
            $user_id = Verify_User::all()->where('token','=',$token)->first()->user_id;

            $user = User::where('id','=',$user_id)->first()->update(['verified'=>1]);
            Verify_User::where('token','=',$token)->delete();
          
            return 'Usuario  Verificado com sucesso';
        }

        return 'Usuario  não foi encontrado';
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
        return Verify_User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verify_User  $Verify_User
     * @return \Illuminate\Http\Response
     */
    public function show(Verify_User $Verify_User)
    {
        return $Verify_User;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verify_User  $Verify_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Verify_User $Verify_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verify_User  $Verify_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verify_User $Verify_User)
    {
        return $Verify_User->update($request->all()) ? "atualizado com sucesso" : "erro na atualização";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verify_User  $Verify_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verify_User $Verify_User)
    {
        return $Verify_User->delete() ? "removido com sucesso" : "erro na remoção";
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
            'token' => ['required', 'string', 'max:255']
        ]);
    }
}
