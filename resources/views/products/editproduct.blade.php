@extends('layouts.master')

@section('title')
Edit
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
		<div class="error-message">
			@if ($errors->any())
				@foreach($errors->all() as $nameError)
					<p style="color:red">{{ $nameError }}</p>
				@endforeach
			@endif
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
						@csrf
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" value="{{ $product->name }}" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" value="{{ $product->price }}" class="form-control">
									</div>
									<div class="form-group" >
											<label>Danh mục</label>
											<select required name="category_id" class="form-control">	
													<option value="{{$product->category->id}}">{{$product->category->name}}</option>
													@foreach ($categories as $category)								
													<option value="{{$category->id}}">{{$category->name}}</option>
													@endforeach
											</select>
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
										@if(($product->image) == null)
												<p> Trống </p>
												@else 
												<img id="avatar" class="thumbnail" width="300px" src="img/{{$product->image}}">
												@endif
										<label>Tải ảnh mới</label>
										<input type="file" class="form-control-file" id="inputFile" name="image">
									</div>	
									{{-- <div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="accessories" class="form-control">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control">
									</div>
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="condition" class="form-control">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea required name="description"></textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											<option value="1">iPhone</option>
											<option value="2">Samsung</option>
											<option value="3">Nokia</option>
											<option value="4">HTC</option>
											<option value="5">LG</option>
											<option value="6">Sony</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div> --}}
									<input type="submit" name="submit" value="Chỉnh sửa" class="btn btn-primary">
									<a href="{{route('products.list')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection