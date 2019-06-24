@extends('layouts.master')

@section('title')
Admin	
@endsection

@section('content')
		
	@include('particles.sidebar')
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		@if (Auth::check())
		<div class="alert alert-success">
		Bạn đang đăng nhập với quyền 
		@if( Auth::user()->level == 1)
			{{ "SuperAdmin" }}
		@elseif( Auth::user()->level == 2)
			{{ "Admin" }}
		@elseif( Auth::user()->level == 3)
			{{ "Thành viên" }}
		@endif
		</div>
		@endif
	
		@if(Session::has('success'))
			<div class="alert alert-success">
				<ul>
						{{Session::get('success')}}
				</ul>
			</div>
		@endif
	
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>

					{{-- Loc theo danh muc --}}
					<form action="{{ route('products.filterByCategory') }}" method="get">
							@csrf
							 <div class="modal-content">
								 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 </div>
								 <div class="modal-body">
									 <!--Lọc theo danh mục -->
									 <div class="select-by-program">
										 <div class="form-group row">
											 <label  class="col-sm-5 col-form-label border-right">Lọc sản phẩm theo danh mục</label>
											 <div class="col-sm-7">
												 <select class="custom-select w-100" name="category_id">
													 <option value="">Chọn danh mục</option>
													 @foreach($categories as $category)
														 @if(isset($categoryFilter))
															 @if($category->id == $categoryFilter->id)
																 <option value="{{$category->id}}" selected >{{ $category->name }}</option>
															 @else
																 <option value="{{$category->id}}">{{ $category->name }}</option>
															 @endif
														 @else
															 <option value="{{$category->id}}">{{ $category->name }}
															 </option>
														 @endif
													 @endforeach
												 </select>
											 </div>
										 </div>
										 <!-- </form> -->
									 </div>
									 <!--End-->
				 
								 </div>
								 <div class="modal-footer">
									 <input type="submit" id="submit" class="btn btn-primary" value="Chọn">
								 </div>
							 </div>
						 </form>

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('products.create')}}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>#</th>
											<th width="20%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th> Giảm giá (%)</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@if(count($products) == 0)
											<tr>
												<td colspan="4">Không có dữ liệu</td>
											</tr>
										@else
										@foreach($products as $key => $product)
										<tr>
											<th scope="row">{{ ++$key }}</th>
											<td>{{$product->name}}</td>
											<td>{{number_format($product->price,0 ,',','.')}}đ</td>
											<td>{{$product->sale}}</td>
											<td>
												@if(($product->image) == null)
												<p> Trống </p>
												@else 
												<img width="300px" height="171px" src="img/{{$product->image}}" class="thumbnail">
												@endif
											</td>
											<td>{{$product->category['name']}}</td>
											<td>
												<a href="{{route('products.edit', $product->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('products.destroy', $product->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										@endif
							
										
										{{-- <tr>
											<td>2</td>
											<td>iPhone 7 Plus 32GB quốc tế Mate Black</td>
											<td>21.990.000 VND</td>
											<td>
												<img width="200px" src="img/iphone7-plus-black-select-2016.jpg" class="thumbnail">
											</td>
											<td>iPhone</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>iPhone 7 Plus 32GB quốc tế Mate Black</td>
											<td>21.990.000 VND</td>
											<td>
												<img width="200px" src="img/iphone7-plus-black-select-2016.jpg" class="thumbnail">
											</td>
											<td>iPhone</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>iPhone 7 Plus 32GB quốc tế Mate Black</td>
											<td>21.990.000 VND</td>
											<td>
												<img width="200px" src="img/iphone7-plus-black-select-2016.jpg" class="thumbnail">
											</td>
											<td>iPhone</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>iPhone 7 Plus 32GB quốc tế Mate Black</td>
											<td>21.990.000 VND</td>
											<td>
												<img width="200px" src="img/iphone7-plus-black-select-2016.jpg" class="thumbnail">
											</td>
											<td>iPhone</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>iPhone 7 Plus 32GB quốc tế Mate Black</td>
											<td>21.990.000 VND</td>
											<td>
												<img width="200px" src="img/iphone7-plus-black-select-2016.jpg" class="thumbnail">
											</td>
											<td>iPhone</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr> --}}
									</tbody>
								</table>			
								<div class="col-6">
										<div class="pagination float-right" style="float:right">
											{{ $products->appends(request()->query()) }}
										</div>
								</div>				
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection
	