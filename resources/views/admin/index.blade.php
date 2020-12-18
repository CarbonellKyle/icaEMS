@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('ICA Equipment Monitoring System') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('admin.create')}}">Monitor Equipment</a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Log ID</th>
                            <th>Borrower Name</th>
                            <th>Equipment Name</th>
                            <th>Datetime Borrowed</th>
                            <th>Datetime Returned</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($admin as $admin)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $admin->borrower_name }}</td>
                            <td>{{ $admin->equipment_name }}</td>
                            <td>{{ $admin->datetime_borrowed }}</td>
                            <td>{{ $admin->datetime_returned }}</td>
                            <td>
                                <form action="{{route('admin.destroy', $admin->id)}}" method="POST">
                                    <a class="btn btn-info" href="{{route('admin.show', $admin->id)}}" >Summary</a>
                                    <a class="btn btn-primary" href="{{route('admin.edit', $admin->id)}}">Update</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
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