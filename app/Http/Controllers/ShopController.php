<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        if($id=='all'){
        $products =Product::where('id','<', 40)
                            ->take(18)
                            ->get();
        $products_1 =Product::where('id','>=', 40)
                            ->take(100)
                            ->get();
        }
        else
        {
        $products =Product::where('category_id', $id)
                            ->take(25)
                            ->get();
        $products_1 =Product::where('category_id', $id)
                            ->take(25)
                            ->get();

        }

        $product_data =  Cart::content();   
        return view('shop.index', compact('products', 'products_1', 'categories','product_data','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function details($id)
    {
        $product_data =  Cart::content();
        $products = Product::paginate(5);
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('shop.details', compact('products','product', 'categories','product_data'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
    public function showcategory()
    {
        
     $product_data =  Cart::content();
     $total_price = Cart::total();
     $categories = Category::all();
     return view('particles.shop_header', compact( 'categories','product_data','count','total_price'));
    }

   
}
