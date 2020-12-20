@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="container mt-3 ml-2">
                <p class="card-title"><strong>/ Summary report / @yield('container-header')</strong></p>
            </div>
            <!-- search for month and year -->
            <form action="{{ route('summary.reports') }}" method="POST">
            @csrf
                <div class="container w-50">
                    <div class="ml-5 d-flex inline">
                        <div class="row">
                            <div class="col-md-5">
                                <select name="pickMonth" id="month" class="browser-default custom-select mr-2" required>
                                        <option value="">Select Month..........</option>
                                        <option id="jan"value="Jan">January</option>
                                        <option value="Feb">Febuary</option>
                                        <option value="Mar">March</option>
                                        <option value="Apr">April</option>
                                        <option value="May">May</option>
                                        <option value="Jun">June</option>
                                        <option value="July">Jul</option>
                                        <option value="Aug">August</option>
                                        <option value="Sep">September</option>
                                        <option value="Oct">October</option>
                                        <option value="Nov">November</option>
                                        <option value="Dec">December</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="pickYear" id="month" class="browser-default custom-select mr-2" required>
                                        <option value="default">Select Year..........</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
            @if(Session('empty'))
                <div class="alert alert-success alert-dismissible show mr-4 ml-4 mt-3  mb-0" role="alert" >
                <strong class="">{{ session('empty') }}</strong>
                <button type="button" data-dismiss="alert" class="close" >
                <span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            <div class="card-body">
                @yield('container')
            </div>
        </div>
    </div>
@endsection