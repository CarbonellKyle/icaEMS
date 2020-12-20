@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
            <div class="card w-50 ">
                <div class="card-header lead">{{ __('Equipment Management') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session('remove'))
                            <div class="alert alert-success alert-dismissible show" role="alert" >
                            <strong class="">{{ session('remove') }}</strong>
                            <button type="button" data-dismiss="alert" class="close" >
                            <span aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                    
                        <div class="d-flex justify-content-end mb-2">
                            <a class="btn btn-sm btn-success" href="{{ route('equipment.create')}}">Add Equipment</a>
                        </div>
                    <div class="table-overflow mb-5">
                        <table class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Equipment Name</th>
                                <th>Date Added</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach ($equipment as $equipment)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $equipment->equipment_name }}</td>
                                <td>{{ $equipment->date_added }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="mr-2 btn btn-sm btn-warning pl-2 pr-2" href="{{ url('update/equipment/'.$equipment->equipment_id) }}">Update</a>
                                        <a class="mr-2 btn btn-sm btn-danger" href="{{ url('/Remove/equipment/'.$equipment->equipment_id.'/'.$equipment->equipment_name) }}">Remove</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection