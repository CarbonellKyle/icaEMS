@extends('layouts.user')
<!-- {{ Auth::user()->name }} method to get the data in every user-->

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="container mt-3 ml-2">
                <p class="card-title"><strong>/ Borrow / History/ Details</strong></p>
            </div>
            <div class="mt-3">
                <div class="container text-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Equipment ID</th>
                            <th>Equipment Name</th>
                            <th>Date Borrowed</th>
                            <th>Date Returned</th>
                        </tr>
                        </thead>
                        <tbody><?php $j =1; ?>
                        @foreach($items as $item)
                        <tr>
                            <td><?php echo $j;$j++ ?></td>
                            <td>{{ $item->equipment_id }}</td>
                            <td>{{ $item->equipment_name }}</td>
                            <td>{{ $item->datetime_borrowed }}</td>
                            <td>{{ $item->datetime_returned }}</td> 
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection