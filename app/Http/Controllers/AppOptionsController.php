<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class AppOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function index()
    {
        $option = Option::find(1);
        return view('AppOptionsViews.index', compact('option'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'street' => 'required|string',
            'number' => 'required|integer',
            'commune' => 'required|string',
            'country' => 'required|string',
        ]);

        $option = Option::findOrFail(1);
        $option->app_name = $request->input('name');
        $option->app_description = $request->input('description');
        $option->app_email = $request->input('email');
        $option->app_phone = $request->input('phone');
        $option->app_address_street = $request->input('street');
        $option->app_address_number = $request->input('number');
        $option->app_address_commune = $request->input('commune');
        $option->app_address_country = $request->input('country');
        $option->update();

        return back()->with('info', 'Ajustes actualizados');
    }
}
