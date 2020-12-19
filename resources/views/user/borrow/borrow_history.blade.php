@extends('layouts.user')
<!-- {{ Auth::user()->name }} method to get the data in every user-->

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card w-50 pr-2 pl-2">
            <div class="container mt-3 ml-2">
                <p class="card-title"><strong>/ Borrow / History</strong></p>
            </div>
            <div class="mt-3">
                <div class="table-overflow  mb-4 ml-2 containertext-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Equipment ID</th>
                            <th>Name</th>
                            <th>Times Borrowed</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody><?php $j =1; ?>
                        @for($i =0; $i < count($items[0]); $i++)
                        <tr>
                            <td><?php echo $j;$j++ ?></td>
                            <td>{{ $items[0][$i]->equipment_id }}</td>
                            <td>{{ $items[0][$i]->equipment_name }}</td>
                            <td>{{ $items[1][$i] }}</td>
                            <td>
                            <a href="{{ url('/User/borrow/history/details/'.$items[0][$i]->equipment_id) }}" class="btn btn-sm btn-success ">Details</a>
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