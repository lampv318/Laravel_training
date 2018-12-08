<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function getLogin (){
      return view('users.login');
    }

    function postLogin(Request $request){
    $this->validate($request,[
      'email'=>'required',
      'password'=>'required'
    ]);

    if(Auth::attempt(['email'=>$request->email,
        'password'=>$request->password])){
        return redirect('/');
      }
      else{
        return redirect('login')->with('alert','Login fail. Please try again nhu lol');
      }
    }
}