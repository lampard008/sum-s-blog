<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Auth;

class UpdateProfile extends Controller
{
    //
    function update_profiles(Request $req) {

   
    $req->validate([
         'username' => 'required|min:5|max:15',
         'email' => 'required|email'
    ]); 
   
    if (strcmp($req->get('username'),$req->get('old_username')) == 0) {
        return back()->with('error','your current username can\'t be the same with the new username'); 
     }


    $user = Auth::user();
    $user->name = $req['username'];
    $user->email = $req['email'];
    $user->save();
    return back()->with('input_message','profile updated successfully');  
    




}


function update_password(Request $req) {
         if (!(Hash::check($req->get('old_password'),Auth::user()->password))) {
            return back()->with('error','your current password doesn\'t match with what was provided');
         }


         if (strcmp($req->get('old_password'),$req->get('password')) == 0) {
            return back()->with('error','your current password can\'t be the same with the new password'); 
         }

         $req->validate([
               'password' => 'required',
               'confirm_password'  => 'required|min:8|string|', 
         ]);
         $user = Auth::user();
         $user->password = bcrypt($req->get('password'));
         $user->save();
         return back()->with('success','password change successfully'); 
    }




}
