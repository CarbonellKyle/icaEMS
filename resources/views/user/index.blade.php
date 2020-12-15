@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                  User Dashboard
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700 text-right">
                        Welcome, {{ Auth::user()->name }}
                    </p><br><br>
                    <h1 class="h1">User Information:</h1><br>
                    <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
                    <p><strong>Account Role: </strong>User</p>
                </div>
            </div>

        </div>
    </div>
@endsection