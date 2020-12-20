@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3 style="color: #1d1b4c">User Page</h3>
        <p class="text-right mr-3">Welcome, <strong style="color: #1d1b4c">{{ Auth::user()->name }}</strong></p>
            <div class="card" style="border: 1px solid #1d1b4c;">
                <div class="card-header" style="background-color: #1d1b4c; color: #fff;">{{ __('User Information') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex">
                        <div class="mr-4 p2"><img src="/img/user.png" style="height: 100px; width: auto;"></div>
                        <div class="p2">
                            <strong style="color: #1d1b4c">Name:</strong> {{ Auth::user()->name }}<br>
                            <strong style="color: #1d1b4c">Email:</strong> {{ Auth::user()->email }}<br>
                            <strong style="color: #1d1b4c">Role :</strong> Superadministrator
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection