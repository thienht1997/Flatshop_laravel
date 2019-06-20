<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Category;

class CategoryController extends Controller
{
    //  public function index()
    public function index()
    {
        $categories = Category::all();   
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request)
    {
        $this->ValidateCategory();
        Category::create($request->all());
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach tinh thanh
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('categories.editcategory', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Category $categories, $id)
    {
        $this->ValidateCategory();
        $categories = Category::findOrFail($id);
        $categories->update($request->all());
        Session::flash('success','Cập nhật sản phẩm thành công');
        return redirect()->route('categories.index');
                        // ->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        //xoa khach hang thuoc tinh thanh nay
        $categories->product()->delete();

        $categories->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa  thành công');
        //cap nhat xong quay ve trang danh sach tinh thanh
        return redirect()->route('categories.index');
    }

    public function ValidateCategory()
    {
        return request()->validate(
       [ 'name' => 'required|min:3|max:30']);
    }
}

