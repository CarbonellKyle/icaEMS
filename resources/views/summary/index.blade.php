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
                                <th>#</th>
                                <th>Equipment_id</th>
                                <th>Equipment_name</th>
                                <th>times_of_barrowed</th>
                                <th>action</th>
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
                                            <a href="{{ url('/summary/index/details/'.$equipments[$i][0]) }}" class="btn btn-sm btn-success ">Details</a>
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