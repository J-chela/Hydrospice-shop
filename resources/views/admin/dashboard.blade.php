@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>👑 Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <a href="{{ route('dashboard') }}" class="btn btn-success mt-3">Go to User Dashboard</a>
</div>
@endsection
