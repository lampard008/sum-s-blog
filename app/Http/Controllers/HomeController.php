<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Illuminate\Support\Facades\DB;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $users = comment::paginate(5);
         return view('home',compact('users')); 
           
    }

    public function post(Request $req) {
        $req->validate([
            'comment'=>'required|max:100'
           ]);
         
         $users = new Comment;
         $users->comment = $req['comment'];
         $users->avatar =  $req['avatar'];
         $users->save();
        return back()->with('post','comment has been added successfully'); 
         
    }

   
   
    }     
        
