@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-10">
                    <strong>System Users / Views / borrow report/ {{$name}} </strong>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('/system/users/details/'.$name) }}" class="text-success">«« back</a>
                    </div>
                </div>
                <div class="table-overflow  mt-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>
                                <th>Date Borrowed</th>
                                <th>Date Returned</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?>@for($i =0; $i < count($items); $i++)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $items[$i]->equipment_id }}</td>
                                        <td>{{ $items[$i]->equipment_name }}</td>
                                        <td>{{ $items[$i]->datetime_borrowed }}</td>
                                        <td>{{ $items[$i]->datetime_returned }}</td>
                                    </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection