
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
     <!-- Scripts for app.blade.php -->
     <script src="{{ asset('js/admin.js') }}" defer></script>
     
    <!-- bootstrap for all clasees extended app.blade.php  -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-blue-900 shadow mb-8 py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="d-flex items-center justify-content-center">
                    <div class=" m-3">
                        <strong class="display-4"> LARAVEL | ERROR  </strong>
                    </div>
                    
                </div>
            </div>
        </nav>
        
        <div class="d-flex justify-content-center">
           <div class="card mt-5 p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead ">Sorry! No records Found!</p>
                        <a href="{{ route('summary.index')}}" class="btn btn-block btn-success mt-4 pt-1 pb-2 lead"><strong style="font-size:23px">←    </strong>Back</a>
                    </div>
                </div>
           </div>
        </div>
    </div>
</body>
</html>
