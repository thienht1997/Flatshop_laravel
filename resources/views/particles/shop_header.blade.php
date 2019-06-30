 <head>
      <style>
            #b {
              display: none;
            }
            
            #a:hover #b {
              display: block;
            }
      </style>
 </head>
 <body id="home">
        <div class="wrapper">
           <div class="header">
              <div class="container">
                 <div class="row">
                    <div class="col-md-2 col-sm-2">
                       <div class="logo"><a href="{{route('shop.index','all')}}"><img src="images/logo.png" alt="FlatShop"></a></div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                       <div class="header_top">
                          <div class="row">
                             <div class="col-md-3">
                                <ul class="option_nav">
                                   <li class="dorpdown">
                                      <a href="{{route('shop.index','all')}}">Eng</a>
                                      <ul class="subnav">
                                         <li><a href="{{route('shop.index','all')}}">Eng</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Vns</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Fer</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Gem</a></li>
                                      </ul>
                                   </li>
                                   <li class="dorpdown">
                                      <a href="{{route('shop.index','all')}}">USD</a>
                                      <ul class="subnav">
                                         <li><a href="{{route('shop.index','all')}}">USD</a></li>
                                         <li><a href="{{route('shop.index','all')}}">UKD</a></li>
                                         <li><a href="{{route('shop.index','all')}}">FER</a></li>
                                      </ul>
                                   </li>
                                </ul>
                             </div>
                             <div class="col-md-6">
                                <ul class="topmenu">
                                   <li><a href="{{route('shop.index','all')}}">About Us</a></li>
                                   <li><a href="{{route('shop.index','all')}}">News</a></li>
                                   <li><a href="{{route('shop.index','all')}}">Service</a></li>
                                   <li><a href="{{route('shop.index','all')}}">Recruiment</a></li>
                                   <li><a href="{{route('shop.index','all')}}">Media</a></li>
                                   <li><a href="{{route('shop.index','all')}}">Support</a></li>
                                </ul>
                             </div>
                             <div class="col-md-3">
                                <ul class="usermenu">
                                   @if(Auth::check())
                                   <div class="dropdown" id='a'>
                                       <li><a href="{{route('shop.index','all')}}" class="log">Welcome {{Auth::user()->name}}</a></li>
                                       <form id='b'action="{{route('logout')}}" method="POST">
                                          @csrf
                                         <button class="btn btn-link" type="submit" style="position: relative; left: 38px; top: 0px;">Logout</button>
                                       </form>
                                       
                                    </div>        
                                   @else
                                   <li><a href="{{route('login')}}" class="log">Login</a></li>
                                   <li><a href="{{route('register')}}" class="reg">Register</a></li>
                                   @endif       
                                </ul>
                             </div>
                          </div>
                       </div>
                       <div class="clearfix"></div>
                       <div class="header_bottom">
                          <ul class="option">
                             <li id="search" class="search">
                             <form action="{{route('shop.search')}}"  method="get">
                                   @csrf
                                   <input class="search-submit" type="submit" value="">
                                   <input class="search-input" placeholder="Enter your search term..." type="text" value="" name="keyword"  value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">
                                 </form>
                             </li>
                             <li class="option-cart">
                             <a href="{{route('cart.show')}}" class="cart-icon">cart <span class="cart_no">{{Cart::count()}}</span></a>
                                <ul class="option-cart-item">
                                   @foreach ($product_data   as $product)
                                        
                                   <li style="position: relative; left: 12px; top: 23px; height:20px">
                                       <img style="width: 50px; height: 30px; left: -2px; top: -51px; transition: none 0s ease 0s; cursor: move;" src="{{ asset('layouts/img/'.$product->options->img)}}" class="thumbnail" data-selected="true" data-label-id="0">
                                       {{$product->name}}
                                    
                                   </li>
                                   @endforeach
                                 <li><span class="total">Total <strong>{{Cart::total()}}VNĐ</strong></span></li>
                                </ul>
                             </li>
                          </ul>
                          <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                          <div class="navbar-collapse collapse">
                             <ul class="nav navbar-nav">
                                <li class="active dropdown">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                   <div class="dropdown-menu">
                                      <ul class="mega-menu-links">
                                         <li><a href="{{route('shop.index','all')}}">home</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Productlitst</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Productgird</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Details</a></li>
                                         <li><a href="{{route('shop.index','all')}}">Cart</a></li>
                                         <li><a href="{{route('shop.index','all')}}">CheckOut</a></li>
                                         <li><a href="{{route('shop.index','all')}}">CheckOut2</a></li>
                                         <li><a href="{{route('shop.index','all')}}">contact</a></li>
                                      </ul>
                                   </div>
                                </li>
                                <li class="dropdown">
                                   <a href="{{route('shop.index','all')}}" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                                   <div class="dropdown-menu mega-menu">
                                      <div class="row">
                                         <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                               @foreach ($categories as $Category)
                                                                  
                                               <li><a href="{{route('shop.index',$Category->id)}}">{{$Category->name}}</a></li>
                                          
                                               @endforeach
                                            </ul>
                                         </div>
                                      </div>
                                   </div>
                                </li>
                             </ul>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>