<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    public function login(){
    	return view('login/login');
    }
    public function logindo(Request $request){
		$user=request()->except('_token');
    	$user['pwd']=$user['pwd'];
		$login=Login::where($user)->first();
    	if($login){
    		session(['adminuser'=>$login]);
    		$request->session()->save();
    		return redirect('/admin/create');
    	}
    	return redirect('login')->with('msg','没有此用户');
    }
}
