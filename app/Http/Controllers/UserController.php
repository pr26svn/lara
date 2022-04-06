<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getList(){
        $jsonList=response()->json(["users"=>User::All()], 200);
        return $jsonList;
    }
    public function getUser($email){
        $user=User::where("email", $email)->count();;
        $jsonList=response()->json(["user"=>$user], 200);
        return $jsonList;

    }
}
