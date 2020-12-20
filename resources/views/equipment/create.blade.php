@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-center">
        <div class="card w-25">
            <div class="row mt-3 ml-2">
                <div class="col-md-9">
					<p class="card-title"><strong>/ Add Equipments </strong></p>
				</div>
				<div class="col-md-3">
					<a class="text-dark	" href="{{ route('equipment.index')}}">&#171;&#171; Back</a>
				</div>
            </div>
            @if(Session('success'))
            	<div class="alert alert-warning alert-dismissible show mr-1 ml-1" role="alert" >
				<strong>{{ session('success') }}</strong>
            	<button type="button" data-dismiss="alert" class="close" >
				<span aria-hidden="true">&times;</span></button>
            	</div>
            @endif
            <form action="{{route('equipment.add')}}" method="POST">
                @csrf
                <div class="container pl-5 ml-5 mt-3 pb-5">
                    <div class=" d-block ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="text-center"><strong>Equipment Name</strong></label>
                                    <input type="text" name="equipment" class="form-control" placeholder="Enter Equipment's name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            <div class="form-group">
                                    <label></label>
                                    <button type="submit" id="btnresult"  class="btn btn-success btn-block">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
	@endsection
