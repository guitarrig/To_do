<?php

namespace App\Http\Controllers;
use  App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function show(Request $request){
      $user = User::find($request->id);
      return view('user', ['user' => $user]);

    }


}
