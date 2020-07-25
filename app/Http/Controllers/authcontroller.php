<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;

class authcontroller extends Controller
{
    public function login(Request $request){
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('home');
    	}else{
    		return redirect()->back()->with('gagal','username dan password salah');
    	}	
    }
    public function logout(){
    	Auth::logout();
    	//return view('dashboard')->with('logouted', 'anda telah log out');
    	return redirect()->route('welcome')->with('logouted', 'anda telah log out');
    }
    public function signup(Request $request){
		$user = new User;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->name = $request->name;
		$user->remember_token = str_random(60);
		$user->save();
			
		$temp = $request->name;
		return redirect()->route('welcome')->with('sukses', $temp.' berhasil sign up');
    }

}
