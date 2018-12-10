<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

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
        return redirect('/');}
      else {
        return redirect('login')->with('alert','Login fail. Please try again');
      }
    }

    function getSignup () {
      return view('users.signup');
    }

    function postSignup (Request $request) {
      $this->validate($request,[
        'username'=>'required',
        'email'=>'required',
        'fullname'=>'required',
        'password'=>'required',
        'password_confirmation'=>'required'
      ]);
    

    $user = new User;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->fullname = $request->fullname;
    $user->password = bcrypt($request->password);
    $user->purpose = $request->purpose;
    $user->save();
    Auth::login($user);

    return redirect('')->with('alert', 'Signup successfully.');
  }

  function logout () {
    Auth::logout();
    return redirect('');
  }
}
