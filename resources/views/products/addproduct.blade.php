@extends('layouts.master')

@section('title')
Add product
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
			<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">
						<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							@csrf
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control">
									</div>
									<div class="form-group" >
											<label>Danh mục</label>
											<select required name="category_id" class="form-control">
													@foreach ($categories as $category)											
													<option value="1">{{$category->name}}</option>
													@endforeach
											</select>
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">									
								
                 		        <input type="file" class="form-control-file" id="image" name="image">
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
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