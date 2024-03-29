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
				<h2 class="page-header">Sản phẩm</h2>
			</div>
		</div><!--/.row-->
	
	
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
					<h4 style="position: relative; left: 16px; top: 9px;">Lọc sản phẩm theo danh mục  <select onchange="this.form.submit()" class="custom-select w-100" name="category_id" >
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
					</h4>
					</form>
								 
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('products.create')}}" class="btn btn-primary" style="position: relative; left: -194px; top: 13px;">Thêm sản phẩm</a>
								<form class="navbar-form navbar-left" action="{{ route('products.search') }}" method="get">
									@csrf
									<div class="row">
										<div class="col-8">
											<div class="form-group">
												<input type="text" class="form-control" name="keyword" placeholder="Search" value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}" style="position: relative; left: 767px; top: 12px;">
											</div>
										</div>
										<div class="col-4">
											<button type="submit" class="btn btn-default"  style="position: relative; left: 975px; top: -22px;">Tìm kiếm</button>
										</div>
									</div>
							</form>	
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
												<center>
												<img width="90px" height="100px" src="img/{{$product->image}}" class="thumbnail">
												</center>
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
	