@extends('layouts.app')

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

	<form action="{{route('admin.index')}}" method="POST">
		@csrf
		<div class="card">
			<div class="row p-5">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Borrower Name:</strong>
						<input type="text" name="borrower_name" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Equipment Name:</strong>
						<input type="text" name="equipment_name" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Datetime Barrowed(YYYY-MM-DD):</strong>
						<input type="text" name="datetime_borrowed" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Datetime Returned(YYYY-MM-DD):</strong>
						<input type="text" name="datetime_returned" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Monitor</button>
				</div>
			</div>
		</div>
	</form>
	@endsection
