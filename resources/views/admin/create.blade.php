@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<a class="btn btn-primary" href="{{ route('admin.index')}}">Back</a>
		</div>
	</div>
</div>

@if ($errors->any())
	<div class="alert alert-danger">
		Whooops! There were some problems with your input.<br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{route('admin.store')}}" method="POST">
		@csrf

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					Borrower Name:
					<input type="text" name="studname" class="form-control">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					Equipment Name:
					<input type="text" name="course" class="form-control">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					Datetime Barrowed:
					<input type="text" name="fee" class="form-control">
				</div>
			</div>

            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					Datetime Returned:
					<input type="text" name="fee" class="form-control">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Monitor</button>
			</div>
		</div>
	</form>
	@endsection
