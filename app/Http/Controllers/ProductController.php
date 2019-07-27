<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $products = Product::where('id', '<', 100)
                            ->orderBy('id', 'DESC')
                            ->paginate(15);
                    
                   
        $categories = Category::all();
        return view('products.list', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('products.addproduct', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request, Product $product)
    {
        $this->ValidateProduct();
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->content = $request->content;
        $product->sale = $request->sale;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
		    $getimage =  $image->getClientOriginalName();
		    $destinationPath = public_path('layouts/img');
            $image->move($destinationPath, $getimage);
            $product->image = $getimage;
        } else {
            $product->image = null;
        }
        $product->save();
    
        $product->save();


        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('products.list')
            ->with('success', 'Tạo mới sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.editproduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->ValidateProduct();

        $product = Product::findOrFail($id);        
        $product->update($request->all());
        $oldimg = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
		    $getimage =  $image->getClientOriginalName();
		    $destinationPath = public_path('layouts/img');
            $image->move($destinationPath, $getimage);
            $product->image = $getimage;
        } else {
            $product->image = $oldimg;
        }
        $product->save();


        return redirect()->route('products.list')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.list')
            ->with('success', 'Xóa sản phẩm thành công');
    }



    public function filterByCategory(Request $request)
    {
        $idCategory = $request->input('category_id');

        //kiem tra Product co ton tai khong
        $CategoryFilter = Category::findOrFail($idCategory);
        //lay ra tat ca Product cua ProductFiler
        $products = Product::where('Category_id', $CategoryFilter->id)->paginate(5);
        $totalProductFilter = count($products);

        $categories = Category::all();

        return view('products.list', compact('products', 'categories', 'totalProductFilter', 'CategoryFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('products.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        $product = Product::all();
        $categories = Category::all();
        return view('products.list', compact('products', 'product','categories'));
    }

    public function ValidateProduct()
    {
        return request()->validate(
            [
                'name' => 'required|min:3|max:100',
                'price' => 'required|min:0|max:500',
                'image' => 'max:2048',
                'sale' =>  'required|digits_between:0,100',
            ]
        );
        // mimes:jpg,jpeg,png,gif|
    }
}
