<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
   	public function loginPage(){
		return view('Auth.login');
	}
	public function registerPage(){
		return view('Auth.register');
	}

	public function Register(Request $request){

		  $request->validate([
            		'name' => ['required', 'string', 'max:255'],
            		'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            		'password' => ['required'],
        		]);

        	$user = User::create([
            		'name' => $request->name,
            		'email' => $request->email,
            		'password' => Hash::make($request->password),
        		]);


        	Auth::login($user);
        	return redirect('/');
	}

	public function Login(Request $request){ 

		$user_credentials = $request->validate([
           		'email' => ['required', 'email'],
            		'password' => ['required'],
       			 ]);
	   
		if (Auth::attempt($user_credentials)) {

            $request->session()->regenerate();
			return redirect()->intended();//dd(auth()->user());
		} else {
			return redirect(route('login'));
		}	
	}

	
	public function logout(Request $request){
		if ($request->user())
    			Auth::logout();
   				$request->session()->invalidate();
                $request->session()->regenerateToken();

    		return redirect('/');
                 }


}	
