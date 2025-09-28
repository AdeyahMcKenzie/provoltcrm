{{-- resources/views/customers/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Customers - ProVoltCRM')
@section('page-title', 'Customers')
@section('page-description', 'Manage your customer database.')

@section('content')
    <div class="bg-white rounded-2xl p-6 card-shadow">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">All Customers</h3>
            <button class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-lg font-medium">
                Add Customer
            </button>
        </div>
        
        <!-- Customer table here -->
        <div class="overflow-x-auto">
            <!-- Your customers table -->
        </div>
    </div>
@endsection