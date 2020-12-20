@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('equipment.index')}}">Back</a>
		</div>
	</div>
</div>

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

	<form action="{{route('equipment.update',$equipment->equipment_id)}}" method="POST">
		@csrf

		@method('PUT')

		<div class="row">
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
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>
	@endsection
