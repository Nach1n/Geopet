<?php

namespace App\Http\Controllers;
use Storage;
use App\User;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin', ['except' => ['edit','update','account','show']]);
    }

    public function index()
    {
        $users = User::select('id','name','lastname','phone_number','email')->whereHas('role', function ($query){
            $query->where('display_name', 'Cliente');
        })->orderBy('id','desc')->get();

        return view('UsersViews.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id','display_name')->get();
        return view('UsersViews.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone-number');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('rol');
        $user->save();

        return redirect('users')->with('info', 'Usuario agregado exitosamente');
    }

    /**
     * Display the specified resource. Public profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $user = User::findOrFail($id);
        return view('UsersViews.show', compact('user'));
        */
    }

    /**
     * Display the specified resource. Private profile.
     *
     * @param  int  $id
     */
    public function account($id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        return view('UsersViews.account', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        return view('UsersViews.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $oldAvatar = $user->avatar;

        $this->authorize($user);

        if($request->hasFile('avatar'))
        {
            $user->avatar = $request->file('avatar')->store('public');
        }
        
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone-number');
        if($request->filled('password') && $request->filled('password_confirmation'))
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        if(strncmp('avatar.jpg', $oldAvatar,10) !== 0)
        {
            Storage::delete($oldAvatar);
        }

        return back()->with('info', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $this->authorize($user);

        if(strncmp('avatar.jpg', $user->avatar, 10) !== 0)
        {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return back()->with('delete', 'El usuario fue eliminado');
    }
}
