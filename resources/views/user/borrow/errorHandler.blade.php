@extends('layouts.user')
<!-- {{ Auth::user()->name }} method to get the data in every user-->

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card w-25 pt-5 pl-5 pb-5">
            <div class="row">
                <div class="col-md-12">
                    <strong class="lead">Opps! You Have no records Yet.</strong>
                    <a href="{{ route('borrow') }}" class="m-3 pl-5 ">Borrow something?</a>
                </div>
            </div>     
        </div>
    </div>
@endsection