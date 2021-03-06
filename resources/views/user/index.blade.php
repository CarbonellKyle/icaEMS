@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3 style="color: #1d1b4c">User Panel</h3>
        <p class="text-right mr-3">Welcome, <strong style="color: #1d1b4c">{{ Auth::user()->name }}</strong></p>
            <div class="card" style="border: 1px solid #1d1b4c;">
                <div class="card-header" style="background-color: #1d1b4c; color: #fff;">{{ __('Quick Guide') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex">
                        Hello, {{ Auth::user()->name }}.<br>
                        You can borrow equipments by clicking the "Borrow"  option at the header section.<br>
                        View the equipmets you borrowed in the "Borrow History".
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection