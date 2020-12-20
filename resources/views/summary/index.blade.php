@extends('summary.container')
@section('container-header')
All Equipments
@endsection
@section('container')
    <div class="container">
        <div class="card ">
            <div class="card-body">
                <div class="table-overflow  mt-0">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>
                                <th>Times Barrowed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?> @for($i = 0; $i < count($equipments); $i++)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $equipments[$i][0] }}</td>
                                        <td>{{ $equipments[$i][1] }}</td>
                                        <td>{{ $equipments[$i][2] }}</td>
                                        <td>
                                            <a href="{{ url('/summary/index/details/'.$equipments[$i][0]).'/'.$equipments[$i][1] }}" class="btn btn-sm btn-success ">Details</a>
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