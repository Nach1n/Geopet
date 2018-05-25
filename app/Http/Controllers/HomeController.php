<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(auth()->user()->isAdmin())
        {
            $users = User::whereHas('role', function($query){
                $query->where('name','client');
            })->count();

            $lastUsers = User::select('id','name', 'avatar')->whereHas('role', function($query){
                $query->where('name', 'client');
            })->orderBy('id','desc')->take(10)->get();

            return view('adminHome', compact('users','lastUsers'));
        }else{
            return view('clientHome');
        }
    }
}
