<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class CartController extends Controller
{
    public function add($id)
    {  
      $product= Product::find($id);
      Cart::add([
        ['id' => $product->id, 'name' =>  $product->name, 'qty' => 1, 'price' =>  $product->price,'weight'=>'0','options' => ['img' =>$product->image]]    
      ]);

      return back();
    }
 
    public function show()
    {
      
        $categories = Category::all();
        $product_data =  Cart::content();
        $total_price = Cart::total();
        return view('shop.cart',compact('product_data','total_price','categories'));
    }

    public function detele($id)
    {
        if($id=='all'){
          Cart::destroy();
        }
        else{
          Cart::remove($id);
        }
      return back();
    }

    public function payment(Request $request)
    {
      $paymentData['product_data'] =  Cart::content();
      $paymentData['info'] = $request->all();

      $paymentData['total_price'] = Cart::total();
      $email = $request->email;
      Mail::send('shop.payment', $paymentData, function ($message) use ($email) {
          $message->from('thienht1997ttt@gmail.com', 'Flat Shop');
          $message->to($email, $email);
          $message->subject('Xác nhận hóa đơn mua hàng');
          Cart::destroy();
      });
      return redirect()->back() 
          ->with('success', 'Quý khách đã đặt hàng thành công!
          • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.
          • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.
            Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!');
      
    }
    
}

