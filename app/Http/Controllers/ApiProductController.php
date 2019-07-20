<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
 
    public function show($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->update($request->all());

        return $Product;
    }

    public function delete(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();

        return 204;
    }
}
