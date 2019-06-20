@extends('layouts.master')

@section('title')
Edit category
@endsection

@section('content')
@include('particles.sidebar')
<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
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
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<form action="{{route('categories.update', $categories->id)}}" method="POST">
						@csrf
						<div class="panel-body">
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control" value="{{ $categories->name }}">
							</div>
							<center>
							<input type="submit" name="submit"  class="btn btn-primary" value="Chỉnh sửa">
							</center>
						</div>
						</form>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection