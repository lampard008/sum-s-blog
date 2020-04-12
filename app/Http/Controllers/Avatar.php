<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Image;


class avatar extends Controller
{
    //
    public function avatar(Request $req) {
        $req->validate([
           'avatar'=>'required'
        ]);
        if ($req->hasFile('avatar')) {
            $avatar = $req->file('avatar');
            $filenames = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('storage/image/'. $filenames));
            $user = Auth::user();
            $user->avatar  = $filenames;
            $user->save(); 
            return back()->with('avatar_message','picture updated successfully');   
        }
      }
    }

