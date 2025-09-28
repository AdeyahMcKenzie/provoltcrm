{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - ProVoltCRM')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back! Here\'s what\'s happening at your shop.')

@section('content')
    <!-- Top Stats Row -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <!-- Revenue Card -->
        <div class="bg-white rounded-2xl p-6 card-shadow card-hover">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-600">Total Revenue</h3>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-4 h-4 text-green-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">BBD ${{ number_format($stats['total_revenue'] ?? 0, 2) }}</div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium">+12%</span>
                <span class="text-gray-500 ml-1">vs last month</span>
            </div>
        </div>
        
        <!-- Add your other cards here... -->
    </div>
    
    <!-- Add the rest of your dashboard content here... -->
@endsection

@section('scripts')
    <!-- Dashboard-specific JavaScript -->
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart')?.getContext('2d');
        if (revenueCtx) {
            new Chart(revenueCtx, {
                // Your chart configuration
            });
        }
    </script>
@endsection