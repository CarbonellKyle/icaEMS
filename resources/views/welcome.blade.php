@extends('layouts.app')

@section('content')
<div class="container-fluid bg-wave">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img src="/img/itss-logo.png" class="w-100">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h1>ICA Equipment Management System</h1>
                <p class="lead mt-4">ICA Equipment Management System is developed for the purpose of Web Software Tools project. However, the system is fully functional and open for future updates.</p>
                <button class="btn btn-primary btn-lg">Download Now</button>
            </div>
        </div>
    </div>

    <!-- How to use -->
    <div class="container">
        <div class="row p-3">

            <!-- Column -->
            <div class=" col-sm-12 col-md-12 col-lg-12">
                <h1 class="text-ff p-3 text-center">How to use</h1>
            </div>

            <!-- Column -->
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                <div class="text-center text-justify p-4 bordered">
                    <i class="text-ff pb-4 fa fa-user-plus"></i>
                    <p class="text-ff h2">Create Account</p>
                    <p class="lead text-ff">Sign in to use the services of ICA Equipment Management System.</p>
                </div>    
            </div>

            <!-- Column -->
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                <div class="text-center text-justify p-4 bordered">
                    <i class="text-ff pb-4 fa fa-arrow-circle-up"></i>
                    <p class="text-ff h2">Choose Item</p>
                    <p class="lead text-ff">Choose the item you wish to borrow, fill up credentials for documentation.</p>
                </div>    
            </div>

            <!-- Column -->
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                <div class="text-center text-justify p-4 bordered">
                    <i class="text-ff pb-4 fa fa-sign-language"></i>
                    <p class="text-ff h2">Borrow Item</p>
                    <p class="lead text-ff">Your application for borrowing equipments will be process.</p>
                </div>    
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="text-center">
                <h3 class="mt-4">Developed By:</h3>
                <p class="lead">Carbonell, Kyle</p>
                <p class="lead mt-n3">Casagan, Medjuil</p>
                <p class="lead mt-n3">Ermio, Johnny</p>
                <p class="lead mt-n3">Peligrino, Adrial Pol</p>
                <p class="lead mt-n3">Sanchez, Charlee Ahl</p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Copyright &copy; 2020 ICA Equipment Management System</p>
    </div>
</footer>
@endsection