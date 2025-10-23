{{-- resources/views/vehicles/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Vehicles - ProVoltCRM')
@section('page-title', 'Vehicles')
@section('page-description', 'Manage your vehicle records.')

@section('content')
    <div class="bg-white rounded-2xl p-6 card-shadow">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">All Vehicles</h3>
            <a href="{{ route('vehicles.create') }}" class="flex items-center space-x-2 bg-sky-950 text-white px-4 py-2 rounded-lg font-medium hover:bg-sky-900 transition-colors">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Register Vehicle</span>
            </a>
        </div>
        <!-- List vehicles -->
        <div class="text-base font-bold text-gray-800 mb-1 overflow-x-auto">
            <!-- Messaging for no vehicles-->
            @if($vehicles->count() == 0)
                <div class="text-center py-12">
                    <i data-lucide="users" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                    <p class="text-gray-500 text-lg">No vehicles yet</p>
                    <p class="text-gray-400 text-sm mb-4">Start by adding your first vehicle!</p>
                    <a href="{{ route('vehicles.create') }}" class="text-purple-600 hover:text-purple-700 font-medium">
                        Add Your First Vehicle →
                    </a>
                </div>
            @else
                <table class="min-w-full text-left ">
                    <!-- Table Headers -->
                    <thead class="bg-gradient-to-br from-cyan-400 to-blue-500 text-white">
                        <tr>
                            <th class="px-4 py-2 rounded-tl-lg rounded-bl-lg">Registration Number</th>
                            <th class="px-4 py-2">Make</th>
                            <th class="px-4 py-2">Model</th>
                            <th class="px-4 py-2">Year</th>
                            <th class="px-4 py-2 ">Owner</th>
                            <th class="px-4 py-2 rounded-tr-lg rounded-br-lg text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach($vehicles as $vehicle)
                        <!-- Table rows go here -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{$vehicle->registration_number}}</td>
                            <td class="px-4 py-2 border-b">{{$vehicle->make}}</td>
                            <td class="px-4 py-2 border-b">{{$vehicle->model}}</td>
                            <td class="px-4 py-2 border-b">{{$vehicle->year}}</td>
                            <td class="px-4 py-2 border-b">{{$vehicle->owner->first_name}} {{$vehicle->owner->surname}}</td>
                            <!-- Action Buttons -->
                            <td class="px-4 py-2 border-b">
                                <div class="flex items-center space-x-2">
                                    <!-- View Button -->
                                    <div class="relative group">
                                        <a href="{{ route('vehicles.show', $vehicle->registration_number) }}" 
                                           class="w-8 h-8 bg-blue-600 hover:bg-blue-700 rounded-lg flex items-center justify-center transition-colors"
                                           title="View Details">
                                            <i data-lucide="eye" class="w-4 h-4 text-white"></i>
                                             <!-- Tooltip bubble -->
                                            <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 hidden group-hover:flex flex-col items-center animate-fade-in">
                                                <div class="bg-gray-800 text-white text-xs font-medium rounded-full py-1 px-3 shadow-lg whitespace-nowrap">
                                                    View Vehicle
                                                </div>
                                                <!-- little arrow (bubble tail) -->
                                                <div class="w-2 h-2 bg-gray-800 rotate-45 -mt-1"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Edit Button-->
                                    <div class="relative group">
                                        <a href="{{ route('vehicles.edit', $vehicle->registration_number) }}" 
                                           class="w-8 h-8 bg-yellow-500 hover:bg-yellow-600 rounded-lg flex items-center justify-center     transition-colors"
                                           title="Edit Vehicle">
                                            <i data-lucide="edit" class="w-4 h-4 text-white"></i>
                                             <!-- Tooltip bubble -->
                                            <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 hidden group-hover:flex flex-col items-center animate-fade-in">
                                                <div class="bg-gray-800 text-white text-xs font-medium rounded-full py-1 px-3 shadow-lg whitespace-nowrap">
                                                    Edit Vehicle
                                                </div>
                                                <!-- little arrow (bubble tail) -->
                                                <div class="w-2 h-2 bg-gray-800 rotate-45 -mt-1"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Verify user role for archive button-->
                                    @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                        <div class="relative group">
                                          <button type="button" onclick="" class="w-8 h-8 bg-red-500 hover:bg-red-600 rounded-lg flex items-center justify-center transition-colors"
                                           title="Archive Vehicle">
                                                <i data-lucide="archive" class="w-4 h-4 text-white"></i>
                                             <!-- Tooltip bubble -->
                                            <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 hidden group-hover:flex flex-col items-center animate-fade-in">
                                                <div class="bg-gray-800 text-white text-xs font-medium rounded-full py-1 px-3 shadow-lg whitespace-nowrap">
                                                    Archive Vehicle
                                                </div>
                                                <!-- little arrow (bubble tail) -->
                                                <div class="w-2 h-2 bg-gray-800 rotate-45 -mt-1"></div>
                                            </div>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination Links -->
                 <div class="mt-6">
                     {{ $vehicles->links() }}
                 </div>
            
                
            @endif
        </div>
    </div>
@endsection
