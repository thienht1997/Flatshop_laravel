
@extends('layouts.shop_master')
@section('title')
    Shopping cart
@endsection
@section('content')

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
                Shopping Cart
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      Image
                    </th>
                    <th>
                      Details
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Quantity
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Delete
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product_data as $product)      
                  <tr>
                           
                    <td>
                      <img src="{{ asset('layouts/img/'.$product->options->img)}}" class="thumbnail">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          {{$product->name}}
                        </div>
                        <p>
                    
                          <a class="review_num" href="#">
                
                          </a>
                        </p>  
                        <p>
                          Product Category : 
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
                      <select name="">
                        <option selected value="1" selected>
                          {{$product->qty}}
                        </option>              
                      </select>
                    </td>
                    <td>
                      <h5>
                        <strong class="red">
                          {{number_format($product->price*$product->qty,0 ,',','.')}}đ
                        </strong>
                      </h5>
                    </td>
                    <td>
                      <a href="{{route('cart.detele',$product->rowId)}}">
                        <img src="images/remove.png" alt="">
                      </a>
                    </td>
                  </tr>              
                    @endforeach
                </tbody>
              </table>
              <div>
                  <h4>Total Price: {{$total_price}}đ</h4><br>
                  <a href="{{route('shop.index','all')}}"><button>Continue Buy </button></a>               
                  <a href="{{route('cart.detele','all')}}"><button>Detele all item</button></a>
                </div>
               <br>
               <br>
               <br>
               <br>
               <br>
                <h3>Confirm Payment</h3><br><br><br>
                @if(Session::has('success'))
			      <div class="alert alert-success">
				      <ul>
						  <h5>{{Session::get('success')}}<h5>
				      </ul>
			      </div>
            @endif
            <div class="alert alert-danger">
                @if ($errors->any())
                  @foreach($errors->all() as $nameError)
                    <h6>{{ $nameError }}</h6>
                  @endforeach
                @endif
            </div>
              <form method="POST" action="{{route('cart.payment')}}">
                @csrf
                <h5>Email address</h5>
                <input class="form-control" type="email" name="email"><br>
                <h5>Name</h5>
                <input class="form-control" type="text" name="name"><br>
                <h5>Phone Number</h5>
                <input class="form-control" type="number" name="number"><br>
                <h5>Address</h5>
                <input class="form-control" type="text" name="address"><br><br>
                <button type="submit">Payment</button>
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