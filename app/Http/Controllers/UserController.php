<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {

            return view('addStaff');
                
        } else {
                
            return view('login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => 'required',
               // 'email' => 'required',
               'username' => 'required|unique:users,username,',
              //  'gender' => 'required',
              //  'address' => 'required',
                'mobile' => 'required',
                'user_position'=>'required',
                'password' => 'required',
                'role' => 'required'

            ]);

            $user = new User([
                'name' => $request->get('name'),
               // 'email' => $request->get('email'),
                'username' => $request->get('username'),
              //  'gender' => $request->get('gender'),
               // 'address' => $request->get('address'),               
                'mobile' => $request->get('mobile'),
                'user_position' => $request->get('user_position'),
                'role' => $request->get('role'),
                'password' => Hash::make($request->get('password')) 
            ]);
            $user->save();
            $users = User::all();
            return redirect()->route('staff');

            /*
            if($request->role == 'viewer')
            {

                return view('admission');
            }
            else{

                return redirect()->route('user.index')->with('success','User saved ! ');
            }
            */
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if (Auth::check()) {

            return view('editStaff',compact('user'));
                
        } else {
                
             return view('login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        
           $rules= [
                'name' => 'required',
               // 'email' => 'required',
              // 'username' => 'required',
              //  'gender' => 'required',
              //  'address' => 'required',
                'mobile' => 'required',
                'user_position'=>'required',
               // 'password' => 'required',
                'role' => 'required'

            ];
            if ($request->has('username') && $request->username != $user->username) {
                $rules['username'] = 'required|unique:users,username';
            }
            $request->validate($rules);

            $user ->update([
                'name' => $request->get('name'),
               // 'email' => $request->get('email'),
                'username' => $request->get('username'),
              //  'gender' => $request->get('gender'),
               // 'address' => $request->get('address'),               
                'mobile' => $request->get('mobile'),
                'user_position' => $request->get('user_position'),
                'role' => $request->get('role'),
                //'password' => Hash::make($request->get('password')) 
            ]);
            $user->save();
            $users = User::all();
            return redirect()->route('staff')->with("success","Staff details updated successfully !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')
        ->where('id', $id)->delete();
        return redirect()->route('staff')->with("success","One staff details deleted !!!");
    }

    public function gotoReset(User $user)
    {

        if (Auth::check()) {

            return view('resetPassword',compact('user'));
                
        } else {
                
             return view('login');
        }


    }


    public function Resetpassword(Request $request,User $user)
    {

        $request->validate([
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ]);
        

        if(strcmp($request->get('confirmpassword'), $request->get('newpassword')) == 1){
            return redirect()->route('reset',compact('user'))->with('error',"new password and confirm password not as same check again!!");
        }


      
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return redirect()->route('staff')->with("success","NewPassword successfully changed!!,inform the staff !!!");

    }



}