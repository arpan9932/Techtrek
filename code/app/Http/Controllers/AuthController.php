<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showlogin(){
        return redirect()->route('home')->with('showloginModal', true);
        
    }
     public function showsignup(){
        return redirect()->route('home')->with('showsignupModal', true);
        
    }
        public function register(Request $request){
            // validate 
            $request->validate([
                'name'=>'required',
                'email' => 'required|unique:users|email',
                'password'=>'required|confirmed'
            ]);
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> \Hash::make($request->password)
            ]);
            // login user here 
            
             if(\Auth::attempt($request->only('email','password'))){
                return redirect()-> route('home');
                }else{
                    return redirect()-> route('home');
                }
                return redirect()-> route('home');
    ;
                
            
        }
    
        public function login(Request $request){
            // validate data 
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
    
            // login code 
            
            if(\Auth::attempt($request->only('email','password'))){
                return redirect()-> route('home');
            }
            else
            {
                $request->session()->flash('message', 'Invalid login details');
                return redirect()-> route('home');
                
            }
            return redirect()-> route('home');
                
    
        }
    
        public function logout(){
            \Session::flush();
            \Auth::logout();
            return redirect()-> route('home');
        }
}
