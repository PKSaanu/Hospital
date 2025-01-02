<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;

class LoginController extends Controller
{
    //

    function checklogin(Request $request)
    {
        //validation

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            
        ]);

        //authentication

        $user_data =array(

            'username' =>$request->get('username'),
            'password' => $request->get('password'),
            
        );

        if(Auth::attempt($user_data))
        {
                        
            return view('home');
                   
        }
        else
        {
            return back()->with('error','Username or Password invalid');
        }
    }

    function logout()
    {
        Auth::logout();
        return view('login');
    }

    
}
