@extends('layouts.user')
<!-- {{ Auth::user()->name }} method to get the data in every user-->

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card w-25 p-5">
            <div class="row">
                <div class="col-md-12">
                    <strong class="lead mb-4">Opps! You Have no records Yet.</strong>
                    <a href="{{ route('borrow') }}" class="m-5 pl-4 ">Borrow something?</a>
                </div>
            </div>     
        </div>
    </div>
@endsection