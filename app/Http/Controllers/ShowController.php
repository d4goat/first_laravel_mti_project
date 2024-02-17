<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
{
    public function show(){
        $input = User::all();

        return response()->json([
            'user'    => $input,
            'message' => 'User',
            'code' => 200
        ]);
    }
}
