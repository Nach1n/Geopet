<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Pet;
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
            $numberUsers = User::whereHas('role', function($query){
                $query->where('name','client');
            })->count();

            $generalMessages = Message::whereHas('sender', function($query){
                $query->whereHas('role',function($sql){
                    $sql->where('name', 'admin');
                });
            })->orderBy('id', 'desc')->take(10)->get();

            $lastUsers = User::select('id','name', 'avatar')->whereHas('role', function($query){
                $query->where('name', 'client');
            })->orderBy('id','desc')->take(8)->get();

            $numberPets = Pet::count();

            return view('adminHome', compact('numberUsers','lastUsers', 'generalMessages', 'numberPets'));
        }else{

            $pets = auth()->user()->pet()->orderBy('id', 'desc')->take(8)->get();
            $notifications = auth()->user()->notifications;
            return view('clientHome', compact('notifications', 'pets'));
        }
    }
}
