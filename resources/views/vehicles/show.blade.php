{{-- resources/views/vehicles/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Vehicles - ProVoltCRM')
@section('page-title', 'Vehicles')
@section('page-description', 'Manage your vehicle records.')

@section('content')

<!-- Top Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Vehicle Info Card -->
    <div class="bg-white card-shadow card-hover rounded-2xl p-6 col-span-1 lg:col-span-2">
        <h3 class="text-sm font-medium text-black">Vehicle Information</h3>
        <div class="mt-6">
            <table class="min-w-full text-left">
                <tbody class="text-left">
                    <tr class="py-6">
                        <td class="font-semibold">Registration Number</td>
                        <td class="font-semibold">Owner</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{$vehicle->registration_number}}</td>
                        <td class="py-2">{{$vehicle->owner->first_name}} {{$vehicle->owner->surname}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Make</td>
                        <td class="font-semibold">Model</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{$vehicle->make}}</td>
                        <td class="py-2">{{$vehicle->model}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Year</td>
                        <td class="font-semibold">Colour</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{$vehicle->year}}</td>
                        <td class="py-2">{{$vehicle->colour}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">VIN</td>
                        <td class="font-semibold">Mileage</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">
                            {{$vehicle->vin_number}}<br>
                        </td>
                        <td class="py-2">
                            {{$vehicle->mileage}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Engine Type</td>
                        <td class="font-semibold">Transmission</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">
                            {{$vehicle->engine_type}}<br>
                        </td>
                        <td class="py-2">
                            {{$vehicle->transmission}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Fuel Type</td>
                        <td class="font-semibold">Description</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">
                            {{$vehicle->fuel_type}}<br>
                        </td>
                        <td class="py-2">
                            {{$vehicle->description}}<br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Vehicles Card -->
    <div class="bg-white card-shadow card-hover rounded-2xl p-6 col-span-1 lg:col-span-2">
        <h3 class="text-sm font-medium text-black">Vehicles</h3>
        <div class="mt-6">
           
        </div>
    </div>

</div>

<!-- Bottom Row -->
<div class="grid gap-6 mb-8"> 
    <!-- Jobs Card -->
    <div class="bg-white card-shadow card-hover rounded-2xl p-6 w-full">
        <h3 class="text-sm font-medium text-black">Jobs</h3>
        <div class="mt-6">
                @if ($jobs->count() > 0)
                    <table class="min-w-full text-left">
                            <thead class="bg-gradient-to-br from-cyan-400 to-blue-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 rounded-tl-lg rounded-bl-lg">Date</th>
                                    <th class="px-4 py-2 ">Registration Number</th>
                                    <th class="px-4 py-2">Technician</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Invoice Total</th>
                                    <th class="px-4 py-2 rounded-tr-lg rounded-br-lg ">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                 @foreach ($jobs as $job)
                                 <tr class="py-6">
                                    <td class="px-4 py-2 border-b">{{ $job->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2 border-b">{{ $job->registration_number }}</td>
                                    <td class="px-4 py-2 border-b">James Brown</td> <!-- Fetch technician name -->
                                    <td class="px-4 py-2 border-b">{{ $job->status}}</td>
                                    <td class="px-4 py-2 border-b">${{ $job->total_cost}}</td>
                                    <td class="px-4 py-2 border-b">View Job</td>
                                 </tr>
                                @endforeach
                        </tbody>
                    </table>
            
                @else
                    <p class="text-gray-500 text-justify">No jobs found</p>
                @endif
        </div>
    </div>
</div>
@endsection


