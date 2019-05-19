<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use Validator;
use Response;

class APILogoutController extends Controller {
    public function logout(Request $request) {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
            
    }
}