@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="row ">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header lead text-center">{{ __('ICA Equipment Monitoring System') }}</div>

                <div class="card-body">
                @if(Session('success'))
                    <div class="alert alert-success alert-dismissible show mr-3 ml-3 text-center" role="alert" >
                    <strong class="">{{ session('success') }}</strong>
                    <button type="button" data-dismiss="alert" class="close" >
                    <span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                            
                            </div>
                        </div>
                    </div>
                    <div class="table-overflow">
                        <table class="table table-bordered ">
                            <tr>
                                <th>Log ID</th>
                                <th>Borrower Name</th>
                                <th>Equipment Name</th>
                                <th>Datetime Borrowed</th>
                                <th>Datetime Returned</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @for($i =0; $i < count($items); $i++)
                            <tr>
                                <td>{{ $items[$i]->Id  }}</td>
                                <td>{{ $items[$i]->borrower_name}}</td>
                                <td>{{ $items[$i]->equipment_name}}</td>
                                <td>{{ $items[$i]->datetime_borrowed }}</td>
                                <td>{{ $items[$i]->datetime_returned }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                    <form action="{{route('admin.destroy', $items[$i]->Id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection