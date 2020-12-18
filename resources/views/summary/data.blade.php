@extends('summary.container')
@section('container-header')
Monthly Equipements
@endsection
@section('container')
    <div class="container">
        <div class="card">
        <a href="{{ route('summary.index') }}" class="text-success mt-1 ml-4"><strong style="font-size:23px">←    </strong>Back</a>
            <div class="card-body">
                <div class="table-overflow">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Equipment_id</th>
                                <th>Equipment_name</th>
                                <th>times_of_barrowed</th>
                                <th>month</th>
                                <th>year</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?> @for($i =0; $i < count($items[0]); $i++)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $items[0][$i]->equipment_id }}</td>
                                        <td>{{ $items[0][$i]->equipment_name }}</td>
                                        <td>{{ $items[1][$i] }}</td>
                                        <td>{{ $items[2][0] }}</td>
                                        <td>{{ $items[2][1] }}</td>
                                        
                                        <td>
                                            <a href="{{ url('/summary/data/details/'.$items[0][$i]->equipment_id.'/'.$items[2][0].'/'.$items[2][1])  }}" class="btn btn-sm btn-success ">Details</a>
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