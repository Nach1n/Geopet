<?php

namespace App\Http\Controllers;

use App\Pet;
use App\User;
use Storage;
use Illuminate\Http\Request;
Use App\Http\Requests\StorePetRequest;
use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:client');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $pets = $user->pet()->get();
        return view('PetsViews.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PetsViews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetRequest $request)
    {
        $pet = new Pet();
        
        if($request->hasFile('avatar'))
        {
            $pet->avatar = $request->file('avatar')->store('public/pets');
        }
        $pet->name = $request->input('name');
        $pet->birth_day = $request->input('birth_day');
        $pet->specie = $request->input('specie');
        $pet->race = $request->input('race');
        $pet->sex = $request->input('sex');
        $pet->color = $request->input('color');
        $pet->reproductive_status = $request->input('reproductive_status');
        $pet->description = $request->input('description');
        $pet->user_id = Auth::user()->id;
        $pet->save();

        return redirect('pets')->with('info', 'Mascota agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        $this->authorize($pet);
        return view('PetsViews.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        $this->authorize($pet);
        return view('PetsViews.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(StorePetRequest $request, Pet $pet)
    {
        $this->authorize($pet);

        $oldAvatar = $pet->avatar;

        if($request->hasFile('avatar'))
        {
            $pet->avatar = $request->file('avatar')->store('public/pets');
        }
        $pet->name = $request->input('name');
        $pet->birth_day = $request->input('birth_day');
        $pet->specie = $request->input('specie');
        $pet->race = $request->input('race');
        $pet->sex = $request->input('sex');
        $pet->color = $request->input('color');
        $pet->reproductive_status = $request->input('reproductive_status');
        $pet->description = $request->input('description');
        $pet->user_id = Auth::user()->id;
        $pet->save();

        if($request->hasFile('avatar') && strncmp('pet.jpg', $oldAvatar,7) !== 0)
        {
            Storage::delete($oldAvatar);
        }

        return back()->with('info', 'Mascota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $this->authorize($pet);

        $avatar = $pet->avatar;
        $pet->delete();

        if(strncmp('pet.jpg', $avatar, 7) !== 0)
        {
            Storage::delete($avatar);
        }

        return redirect('pets')->with('delete', 'Mascota eliminada');
    }
}
