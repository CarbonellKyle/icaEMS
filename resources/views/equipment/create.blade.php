@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<a class="btn btn-primary" href="{{ route('equipment.index')}}">Back</a>
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

	<form action="{{route('equipment.index')}}" method="POST">
		@csrf
		<div class="card">
			<div class="row p-5">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Equipment Name:</strong>
						<input type="text" name="equipment_name" class="form-control" placeholder="Equipment Name">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Date Added:</strong>
						<input type="date" name="date_added" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</div>
		</div>
	</form>
	@endsection
