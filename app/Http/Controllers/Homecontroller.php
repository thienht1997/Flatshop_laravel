<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('shop.index','all');
    }

    public function dashboard()
    {
        $amount_products = Product::all()->count();
        $amount_categories = Category::all()->count();
        return view('index',compact('amount_products','amount_categories'));
    }
}
