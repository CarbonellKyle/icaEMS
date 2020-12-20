@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Equipment Management') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('equipment.create')}}">Add Equipment</a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Equipment Name</th>
                            <th>Date Added</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($equipment as $equipment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $equipment->equipment_name }}</td>
                            <td>{{ $equipment->date_added }}</td>
                            <td>
                                <form action="{{route('equipment.destroy', $equipment->equipment_id)}}" method="POST">
                                    <a class="btn btn-info" href="{{route('equipment.show', $equipment->equipment_id)}}" >View</a>
                                    <a class="btn btn-primary" href="{{route('equipment.edit', $equipment->equipment_id)}}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
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