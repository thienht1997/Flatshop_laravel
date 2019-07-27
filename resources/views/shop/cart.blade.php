
@extends('layouts.shop_master')
@section('title')
    Giỏ hàng
@endsection
@section('content')
        <script>
          let confirmDel = () =>{
            let checkstr =  confirm('Are you sure you want to delete this item?');
          if(checkstr == true){
              return true;
          }else{
              return false;
          }
          }

          let updateCart = (qty, rowId) =>{
            alert("???");

          }
        </script>

        <div class="clearfix">
        </div>
        <div class="page-index">
          <div class="container">
            <p>
              Home - Shopping Cart
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Giỏ hàng
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      Hình ảnh
                    </th>
                    <th>
                      Tên sản phẩm
                    </th>
                    <th>
                      Giá
                    </th>
                    <th>
                      Số lượng
                    </th>
                    <th>
                      Tổng giá
                    </th>
                    <th>
                    
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product_data as $product)      
                  <tr>
                           
                    <td>
                        <img width="90px" height="100px" src="{{ asset('layouts/img/'.$product->options->img)}}" class="thumbnail">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                            {{$product->name}}
                        </div>
                        <p>
                            {{$product->content}}
                          
                        </p>  
                        <p>
                          
                          <strong class="pcode">
                            {{$product->category['name']}}
                          </strong>
                        </p>
                      </div>
                    </td>
                    <td>
                      <h5>
                        {{number_format($product->price,0 ,',','.')}}đ
                      </h5>
                    </td>
                    <td>
                    <input type ="number" value="{{$product->qty}}" style="width:70px" onchange="updateCart(this.value,'{{$product->rowId}}')">
                    </td>
                    <td>
                      <h5>
                        <strong class="red">
                          {{number_format($product->price*$product->qty,0 ,',','.')}}đ
                        </strong>
                      </h5>
                    </td>
                    <td>
                      <a href="{{route('cart.detele',$product->rowId)}}" onclick="return confirmDel()";>
                        <img src="images/remove.png" alt="">
                      </a>
                    </td>
                  </tr>              
                    @endforeach
                </tbody>
              </table>
              
              <div>
                  <h4>Tổng cộng: {{$total_price}}đ</h4><br>
                  <a href="{{route('shop.index','all')}}"><button>Tiếp tục mua </button></a>               
                  <a href="{{route('cart.detele','all')}}"><button  onclick="return confirm('Are you sure you want to delete all item?')">Xóa tất cả</button></a>
                </div>
               <br>
               <br>
               <br>
               <br>
               <br>
                <h3>Xác nhận thanh toán</h3><br><br><br>
                @if(Session::has('success'))
			      <div class="alert alert-success">
				      <ul>
						  <h5>{{Session::get('success')}}<h5>
				      </ul>
			      </div>
            @endif
            
                @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $nameError)
                    <h6>{{ $nameError }}</h6>
                  @endforeach
                </div>
                @endif
            
              <form method="POST" action="{{route('cart.payment')}}">
                @csrf
                <h5>Email</h5>
                <input class="form-control" type="email" name="email"><br>
                <h5>Họ và tên</h5>
                <input class="form-control" type="text" name="name"><br>
                <h5>Số điện thoại liên hệ</h5>
                <input class="form-control" type="number" name="number"><br>
                <h5>Địa chỉ</h5>
                <input class="form-control" type="text" name="address"><br><br>
                <button type="submit">Xác nhận</button>
              </form>
              <div class="clearfix">
              </div>
             
            </div>
          </div>
          <div class="clearfix">
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
     @endsection