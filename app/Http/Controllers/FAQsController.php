<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FAQsController extends Controller
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
        $FAQs = Faq::all();
        return view('FAQsViews.index', compact('FAQs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FAQsViews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:120',
            'description' => 'required|string',
            'published' => 'required|boolean'
        ]);
        
        $FAQ = new Faq();
        $FAQ->title = $request->input('title');
        $FAQ->description = $request->input('description');
        $FAQ->published = $request->input('published');
        $FAQ->save();

        return redirect('faqs')->with('info', 'Se agrego la pregunta frecuente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('FAQsViews.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:120',
            'description' => 'required|string',
            'published' => 'required|boolean' 
        ]);

        $faq = Faq::findOrFail($id);
        $faq->title = $request->input('title');
        $faq->description = $request->input('description');
        $faq->published = $request->input('published');
        $faq->update();
        return back()->with('info', 'Pregunta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect('faqs')->with('delete', 'La pregunta frecuente fue eliminada');
    }
}
