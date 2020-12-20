@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <strong>System Users</strong>
                    </div>
                    <div class="col-md-9">
                        <form action="{{ url('/system/user') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="user" class="form-control-md form-control" placeholder="Search User..." required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-md btn-success">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(Session('warning'))
                        <div class="alert alert-warning alert-dismissible show" role="alert" ><strong>{{ session('warning') }}</strong>
                        <button type="button" data-dismiss="alert" class="close" ><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                @if(Session('success'))
                    <div class="alert alert-success alert-dismissible show mr-2 ml-2" role="alert" >
                    <strong class="">{{ session('success') }}</strong>
                    <button type="button" data-dismiss="alert" class="close" >
                    <span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="table-overflow  mt-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody><?php $x= 1;
                        ?>@for($i = 0; $i < count($users); $i++)
                                    <tr>
                                        <td><?php echo $x; $x++ ?></td>
                                        <td>{{ $users[$i]->name }}</td>
                                        <td>{{ $users[$i]->email }}</td>
                                        <td>{{ $users[$i]->user_type }}</td>
                                        <td>
                                            <a href="{{ url('/system/users/details/'.$users[$i]->name) }}" class="btn btn-sm btn-success">View</a>
                                            <a href="{{ url('/system/users/delete/'.$users[$i]->id).'/'.$users[$i]->name }}" class="btn btn-sm btn-danger">Delete</a>
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