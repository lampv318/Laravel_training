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
    $user = User::where('email', $request->email)->first();
    if(Auth::attempt(['email'=>$request->email,
        'password'=>$request->password])){
        return redirect("/{$user->username}/my_page");}
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

  function profile($username){
    $user = User::where('username',$username)->first();
    return view('users.profile')->with('user',$user);
  }

  function postUpdate(Request $request, $username){
    $user = User::where('username',$username)->first();
    $user->fullname = $request->fullname;
    $user->birthday = $request->birthday;
    $user->weight = $request->weight;
    $user->height = $request->height;
    $user->job = $request->job;
    $user->address = $request->address;
    $user->purpose = $request->purpose;
    $user->save();

    return redirect()->back()->with('alert', 'Update profile successfully.');
  }

  function getMyPage($username){
    $user = User::where('username', $username)->first();
    
    $following_program = $user->following_program;
    return view('users.my_page')->with([
      'following_program' => $following_program,
      'user' => $user
    ]);
  }
}
