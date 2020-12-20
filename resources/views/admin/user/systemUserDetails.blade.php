@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-10">
                    <strong>System Users / Views / {{ $name }}</strong>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('system.user') }}" class="text-success">«« back</a>
                    </div>
                </div>
                <div class="table-overflow  mt-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>
                                <th>Times Borrowed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?>@for($i = 0; $i < count($items[0]); $i++)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $items[0][$i]->equipment_id }}</td>
                                        <td>{{ $items[0][$i]->equipment_name }}</td>
                                        <td>{{ $items[1][$i] }}</td>
                                        <td>
                                            <a href="{{ url('system/user/views/borrow-report/'.$items[0][$i]->equipment_id.'/'.$name) }}" class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>
                           @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection