<?php

namespace App\Http\Controllers;

use App\Option;
use App\Faq;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $app_option = Option::find(1);
        $FAQs = Faq::select('title','description')->where('published', 1)->take(6)->get();
        $products = Product::where('published', 1)->take(3)->get();
        return view('FrontViews.index', compact('app_option', 'FAQs', 'products'));
    }
}
