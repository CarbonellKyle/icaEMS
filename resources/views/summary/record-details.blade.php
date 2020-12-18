@extends('summary.container')
@section('container-header')
Monthly Equipements / Details
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
                                <th>Borrower</th>
                                <th>Date Borrowed</th>
                                <th>Date Returned</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?> @foreach($items as $item)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $item->equipment_id }}</td>
                                        <td>{{ $item->equipment_name }}</td>
                                        <td>{{ $item->borrower_name }}</td>
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