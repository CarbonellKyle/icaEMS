@extends('layouts.app')

@section('content')
@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Whooops!</strong> There were some problems with your input.<br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{route('admin.update',$admin->logs_id)}}" method="POST">
		@csrf

		@method('PUT')

		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Borrower Name:</strong>
					<input type="text" name="studname" class="form-control" placeholder="">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Equipment Name:</strong>
					<input type="text" name="course" class="form-control" placeholder="">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Datetime Barrowed:</strong>
					<input type="text" name="datetime_borrowed" class="form-control" placeholder="">
				</div>
			</div>

            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Datetime Returned:</strong>
					<input type="text" name="datetime_returned" class="form-control" placeholder="">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>
	@endsection
