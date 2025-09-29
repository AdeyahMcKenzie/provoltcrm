{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - ProVoltCRM')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back ' . Auth::user()->first_name .'! Here\'s what\'s happening at your shop.')


@section('content')
    
    <!-- Top Stats Row -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <!-- Revenue Card -->
        <div class="bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl p-6 card-shadow card-hover">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-white">Total Revenue</h3>
                <div class="w-8 h-8 bg-cyan-200 rounded-lg flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-4 h-4 text-cyan-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">BBD ${{ number_format($stats['total_revenue'] ?? 0, 2) }}</div>
            <div class="flex items-center text-sm">
                <span class="text-green-700 font-medium">+12%</span>
                <span class="text-white ml-1">vs last month</span>
            </div>
        </div>
        <!-- Customer Card -->
        <div class="bg-gradient-to-br from-lime-300 to-green-600 rounded-2xl p-6 card-shadow card-hover">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-white">Total Customers</h3>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4 text-green-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">{{ number_format($stats['active_customers']) }}</div>
            <div class="flex items-center text-sm">
                
                
            </div>
        </div>
        <!-- Active Jobs Card -->
        <div class="bg-gradient-to-br from-indigo-400 to-purple-600 rounded-2xl p-6 card-shadow card-hover">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-white">Active Jobs</h3>
                <div class="w-8 h-8 bg-violet-200 rounded-lg flex items-center justify-center">
                    <i data-lucide="plug" class="w-4 h-4 text-violet-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">{{ number_format($stats['active_jobs']) }}</div>
            <div class="flex items-center text-sm">
                
                
            </div>
        </div>
           <!-- Completion Rate Card -->
        <div class="bg-gradient-to-br from-yellow-300 to-orange-600 rounded-2xl p-6 card-shadow card-hover">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-white">Completion Rate</h3>
                    <div class="w-8 h-8 bg-orange-200 rounded-lg flex items-center justify-center">
                        <i data-lucide="check" class="w-4 h-4 text-orange-600"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">{{ number_format($stats['completion_rate']) }}</div>
                <div class="flex items-center text-sm">
                    
                </div>
        </div>
    </div>

    <!-- Middle Section-->
    <div class="grid grid-cols-10 gap-6 mb-8">
        <!-- Quick Actions Card-->
        <div class="col-span-3 ">
            <div class="bg-white rounded-2xl p-6 card-shadow card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-600">Quick Actions</h3>
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="zap" class="w-4 h-4 text-green-600"></i>
                        </div>
                    </div>
                    <div class="text-2xl text-gray-800 mb-1">
                        <!-- List of actions-->
                        <ul>
                            <li class="flex items-center space-x-2 border-b py-4 text-2xl text-gray-800 mb-1">
                                <!-- Customer Icon -->
                                 <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="users" class="w-5 h-5  text-white "></i>
                                 </div>
                                <!-- Text -->
                                <span>Add A Customer</span>
                            </li>
                            <li class="flex items-center space-x-2 border-b py-4 text-2xl text-gray-800 mb-1">
                                <!-- Service Icon -->
                                 <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="cable" class="w-5 h-5  text-white "></i>
                                 </div>
                                <!-- Text -->
                                <span>Add A Service</span>
                            </li>
                            <li class="flex items-center space-x-2 border-b py-4 text-2xl text-gray-800 mb-1">
                                <!-- File Icon -->
                                 <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="file-plus-2" class="w-5 h-5  text-white "></i>
                                 </div>
                                <!-- Text -->
                                <span>Create A New Job</span>
                            </li>
                            <li class="flex items-center space-x-2  py-4 text-2xl text-gray-800 mb-1">
                                <!-- File Icon -->
                                 <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="receipt-text" class="w-5 h-5  text-white "></i>
                                 </div>
                                <!-- Text -->
                                <span>Create A Quote</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center text-sm">   
                    </div>
            </div>
        </div>
        <div class="col-span-7  ">
            <div class="bg-white rounded-2xl p-6 card-shadow card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-600">Recent Jobs</h3>
                        <div class="w-8 h-8 bg-blue-950 rounded-lg flex items-center justify-center">
                            <i data-lucide="layers" class="w-4 h-4 text-white"></i>
                        </div>
                    </div>
                    <div class="text-base font-bold text-gray-800 mb-1">
                        <table class="min-w-full ">
                            <thead class="bg-sky-950 text-white ">
                                <tr>
                                    <th class="px-4 py-2 rounded-tl-lg rounded-bl-lg">Registration #</th>
                                    <th class="px-4 py-2 ">Make</th>
                                    <th class="px-4 py-2 ">Model</th>
                                    <th class="px-4 py-2 ">Technician</th>
                                    <th class="px-4 py-2 rounded-tr-lg rounded-br-lg">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($recent_jobs as $job)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $job->registration_number }}</td>
                                        <td class="px-4 py-2 border-b">{{ $job->vehicle->make }}</td>
                                        <td class="px-4 py-2 border-b">{{ $job->vehicle->model }}</td>
                                        <td class="px-4 py-2 border-b">
                                            {{ $job->technicianUser ? $job->technicianUser->first_name : 'Unassigned' }}
                                        </td>
                                        <!-- Set background colour based on status-->
                                        @switch($job->status)
                                            @case('scheduled')
                                                <td class="px-4 py-2 border-b"> 
                                                    <span class="bg-blue-600 text-white rounded-md font-semibold px-3 py-1">scheduled</span>
                                                </td>
                                            @break
                                            @case('in_progress')
                                                <td class="px-4 py-2 border-b"> 
                                                    <span class="bg-amber-500 text-white rounded-md font-semibold px-3 py-1">in progress</span>
                                                </td>
                                            @break
                                            @case('completed')
                                                <td class="px-4 py-2 border-b"> 
                                                    <span class="bg-lime-500 text-white rounded-md font-semibold px-3 py-1">completed</span>
                                                </td>
                                            @break
                                            @case('cancelled')
                                                <td class="px-4 py-2 border-b"> 
                                                    <span class="bg-red-600 text-white rounded-md font-semibold px-3 py-1">cancelled</span>
                                                </td>
                                            @break
                                            @default
                                                <td class="px-4 py-2 border-b"> 
                                                    <span class="bg-gray-400 text-white rounded-md font-semibold px-3 py-1">unknwon</span>
                                                </td>
                                        @endswitch
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="text-gray-400 font-medium">Showing 1 to 13 of 20 entires</span>
                        <span class="text-gray-500 ml-1"></span>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<!-- Dashboard-specific JavaScript -->

    document.addEventListener('DOMContentLoaded', function () {
        lucide.createIcons();
    });

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart')?.getContext('2d');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            // Your chart configuration
        });
    }

@endsection