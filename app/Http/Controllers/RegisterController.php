<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        //set validation
        $validator = Validator::make($input, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'name'      => $input['name'],
            'email'     => $input['email'],
            'password'  => bcrypt($input['password'])
        ]);

        //return response JSON user is created
        if($user) {
            return response()->json([
                'success' => true,
                'user'    => $user,  
            ], 200);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
}