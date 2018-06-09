<?php

namespace App\Http\Controllers;

use Storage;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('ProductsViews.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProductsViews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->avatar = $request->file('avatar')->store('public/products');
        $product->brand_name = $request->input('brand_name');
        $product->model_name = $request->input('model_name');
        $product->network = $request->input('network');
        $product->cpu = $request->input('cpu');
        $product->battery = $request->input('battery');
        $product->battery_life = $request->input('battery_life');
        $product->car_charger = $request->input('car_charger');
        $product->wall_charger = $request->input('wall_charger');
        $product->certificate = $request->input('certificate');
        $product->item_size = $request->input('item_size');
        $product->weight = $request->input('wight');
        $product->comunication_protocol = $request->input('comunication_protocol');
        $product->band = $request->input('band');
        $product->gps_module = $request->input('gps_module');
        $product->gps_chip = $request->input('gps_chip');
        $product->gps_accuracy = $request->input('gps_accuracy');
        $product->standby = $request->input('standby');
        $product->operation_temp = $request->input('operation_temp');
        $product->price = $request->input('price');
        $product->published = $request->input('published');
        $product->save();

        return redirect('products')->with('info', 'Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('ProductsViews.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldAvatar = $product->avatar;

        if($request->hasFile('avatar'))
        {
            $product->avatar = $request->file('avatar')->store('public/products');
        }

        $product->brand_name = $request->input('brand_name');
        $product->model_name = $request->input('model_name');
        $product->network = $request->input('network');
        $product->cpu = $request->input('cpu');
        $product->battery = $request->input('battery');
        $product->battery_life = $request->input('battery_life');
        $product->car_charger = $request->input('car_charger');
        $product->wall_charger = $request->input('wall_charger');
        $product->certificate = $request->input('certificate');
        $product->item_size = $request->input('item_size');
        $product->weight = $request->input('weight');
        $product->comunication_protocol = $request->input('comunication_protocol');
        $product->band = $request->input('band');
        $product->gps_module = $request->input('gps_module');
        $product->gps_chip = $request->input('gps_chip');
        $product->gps_accuracy = $request->input('gps_accuracy');
        $product->standby = $request->input('standby');
        $product->operation_temp = $request->input('operation_temp');
        $product->price = $request->input('price');
        $product->published = $request->input('published');
        $product->update();

        if($request->hasFile('avatar') && strncmp('product.jpg', $oldAvatar,10) !== 0)
        {
            Storage::delete($oldAvatar);
        }

        return back()->with('info', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $avatar = $product->avatar;
        $product->delete();

        if(strncmp('avatar.jpg', $avatar, 10) !== 0)
        {
            Storage::delete($avatar);
        }

        return redirect('products')->with('delete', 'Producto eliminado');
    }
}