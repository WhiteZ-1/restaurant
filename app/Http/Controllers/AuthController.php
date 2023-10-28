<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $incoming = $request->validate([
            'email'=>'required|exists:users',
            'password'=>'required',
        ],[
            'email.required'=>'Please fill in the field',
            'email.exists'=>'Please enter correct credentails',
            'password'=>'Please fill in the field', 
        ]);
        if (auth()->attempt(['email'=> $incoming['email'],'password'=> $incoming['password']])){
            if(auth()->user()->is_admin){
                $request->session()->regenerate();
                return redirect()->route('admin');
            }
            else{
                $request->session()->regenerate();
                return redirect()->route('home');  
            }                    
        }

        else{
            return redirect('/');
        }
    }
    public function register(Request $request){
        $incoming = $request->validate([
            'name'=>'required',
            'email'=>['required', 'unique:users'],
            'password'=>'required'
        ]);

        $incoming['password'] = bcrypt($incoming['password']);
        $user = User::create($incoming);
        auth()->login($user);
        return redirect(route('home'));
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function registerPage(){
        return view('Auth.register');
    }
    public function loginPage(){
        return view('Auth.login');
    }
}
