@extends('layouts.shop_master')
@section('title')
Detail
@endsection
@section('content')
<div class="clearfix">
</div>
<div class="page-index">
  <div class="container">
    <p>
      Home - Products Details
    </p>
  </div>
</div>
</div>
<div class="clearfix">
</div>
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="products-details">
          <div class="preview_image">
            <div class="preview-small">
              <img id="zoom_03" src="{{ asset('layouts/img/'.$product->image) }}"
                data-zoom-image="images/products/Large/products-01.jpg" alt="">
            </div>
          </div>
          <div class="products-description">
            <h5 class="name">
              {{$product->name}}
            </h5>
  
            <p>
              Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante
              ipsum primis in faucibus orci luctus et ultrie ces posuere cubilia curae. Proin lectus ipsum, gravida etds
              mattis vulps utate, tristique ut lectus. Sed et lorem nunc...
            </p>
            <hr class="border">
            <div class="price">
              Price :
              <span class="new_price">
                {{$product->price}}
                <sup>
                  VND
                </sup>
                <strike class="price" style="color:gray; font-size:15px; left: 101px; top: 2px;">{{number_format($product->price/80*100,0 ,',','.')}}VNĐ</strike>
              </span>
            </div>
            <hr class="border">
            <div class="wided">
              <div class="qty">
                Qty &nbsp;&nbsp;:
                <select>
                  <option>
                    1
                  </option>
                </select>
              </div>
              <div class="button_group">
                <a href="{{route('cart.add', $product->id)}}"><button class="button">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                </button></a>
                <button class="button compare">
                  <i class="fa fa-exchange">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-heart-o">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-envelope-o">
                  </i>
                </button>
              </div>
            </div>
            <div class="clearfix">
            </div>
            <hr class="border">

          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="clearfix">
        </div>
        <div id="productsDetails" class="hot-products">

          <h1> Hot Product</h1>
        </div>
      </div>
    </div>

    <li>
      <div class="row">
        @foreach($products as $key => $product)
        <div class="col-md-3 col-sm-6">
          <div class="products">
            <div class="offer">- %20</div>
            <div class="thumbnail"><a href="{{route('shop.details',  $product->id)}}"><img width="183" height="80"
                  src="{{ asset('layouts/img/'.$product->image) }}" alt="Product Name"></a></div>
            <div class="productname">{{$product->name}}</div>
            <h4 class="price">{{$product->price}}</h4>
            <strike class="price" style="color:gray; font-size:15px">{{number_format($product->price/80*100,0 ,',','.')}}đ</strike>
            <div class="button_group"><a href="{{route('cart.add', $product->id)}}"><button class="button add-cart" type="button"><span class="glyphicon glyphicon-shopping-cart"></span></button></a><button class="button compare" type="button"><i
                    class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i
                    class="fa fa-heart-o"></i></button></div>
          </div>
        </div>
        @endforeach
      </div>
    </li>
    </li>
    </ul>
  </div>
  <div class="clearfix">
  </div>
</div>
<div class="col-md-3">

  <div class="clearfix">
  </div>

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