@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-start p-10 bg-gray-50">

    <div class="bg-white shadow rounded-lg p-6 w-full">

        <h3 class="text-2xl font-semibold text-gray-800">
            Welcome, {{ Auth::user()->name }} 🌿
        </h3>

    </div>

</div>
@endsection
