@extends('layouts.user')
<!-- {{ Auth::user()->name }} method to get the data in every user-->

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card w-25">
            <div class="container mt-3 ml-2">
                <p class="card-title"><strong>/ Borrow </strong></p>
            </div>
            @if(session('message'))
                <div class="alert alert-success text-center  mr-3 ml-3">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <form action="{{ route('borrow.submit') }}" method="POST">
                @csrf
                <div class="container pl-5 ml-5 pb-5">
                    <div class=" d-block ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="text-center"><strong>Selct equipments</strong></label>
                                    <select name="borrowed_item" id="month" class="browser-default custom-select mr-2"required>
                                            <option value="">Select Equipments..........</option>
                                            @foreach($items as $item)
                                            <option value="{{ $item->equipment_id }}">{{ $item->equipment_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label><strong>Select date to return</strong></label>
                                    <input type="date" name="date_returned" class="form-control " required>
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