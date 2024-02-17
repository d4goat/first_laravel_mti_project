<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteUser($id){
        $usr = User::find($id);
        if($usr){
            $usr->delete();
            return response()->json([
                'message' => "Data successfully deleted",
                'code' => 200
            ]);
        }else{
            return response([
                'message' => "Failed delete data $id / data doesn't exists"
            ]);
        }
    }

    public function updateUser($id){
        $usr = User::find($id);
        return response()->json($usr);
    }
}
