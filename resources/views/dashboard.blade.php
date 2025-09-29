@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back! Here\'s what\'s happening at your shop.')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            Welcome {{ Auth::user()->first_name }}, you're logged in!
        </div>
    </div>
</div>
@endsection
