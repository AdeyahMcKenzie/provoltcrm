{{-- resources/views/customers/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Customers - ProVoltCRM')
@section('page-title', 'Customers')
@section('page-description', 'Manage your customer records.')

@section('content')
<!-- Top Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Customer Info Card -->
    <div class="bg-white card-shadow card-hover rounded-2xl p-6 col-span-1 lg:col-span-2">
        <h3 class="text-sm font-medium text-black">Customer Information</h3>
        <div class="mt-6">
            <table class="min-w-full text-left">
                <tbody class="text-left">
                    <tr class="py-6">
                        <td class="font-semibold">Name</td>
                        <td class="font-semibold">Preferred Contact Method</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{ $customer->first_name }} {{ $customer->surname }}</td>
                        <td class="py-2">{{ $customer->preferred_contact_method }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Email Address</td>
                        <td class="font-semibold">Alternative Contact Number</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{ $customer->email_address }}</td>
                        <td class="py-2">{{ $customer->alternative_contact }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Contact Number</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">{{ $customer->contact_number }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Address</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2">
                            {{ $customer->street_address }}<br>
                            {{ $customer->province }}<br>
                            {{ $customer->parish }}
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
            @if ($customer->vehicles->count() > 0)
                <!-- Vehicles table -->
                <table class="min-w-full text-left">
                    <thead class="bg-gradient-to-br from-lime-300 to-green-600 text-white">
                        <tr>
                            <th class="px-4 py-2 rounded-tl-lg rounded-bl-lg">Registration Number</th>
                            <th class="px-4 py-2 ">Year</th>
                            <th class="px-4 py-2">Colour</th>
                            <th class="px-4 py-2">Make</th>
                            <th class="px-4 py-2">Model</th>
                            <th class="px-4 py-2 rounded-tr-lg rounded-br-lg ">Actions</th>
                        </tr>
                    </thead>
                    <!-- Vehicle Rows-->
                    <tbody class="text-left">
                        @foreach ($customer->vehicles as $vehicle)
                            <tr class="py-6">
                                <td class="px-4 py-2 border-b">{{ $vehicle->registration_number }}</td>
                                <td class="px-4 py-2 border-b">{{ $vehicle->year}}</td>
                                <td class="px-4 py-2 border-b">{{ $vehicle->colour}}</td>
                                <td class="px-4 py-2 border-b">{{ $vehicle->make}}</td>
                                <td class="px-4 py-2 border-b">{{ $vehicle->model}}</td>
                                <td class="px-4 py-2 border-b">View Vehicle</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500 text-justify">No vehicles found</p>
            @endif
        </div>
    </div>

</div>

<!-- Bottom Row -->
<div class="grid gap-6 mb-8"> 
    <!-- Jobs Card -->
    <div class="bg-white card-shadow card-hover rounded-2xl p-6 w-full">
        <h3 class="text-sm font-medium text-black">Jobs</h3>
        <div class="mt-6">
                @if ($customer->jobs->count() > 0)
                    <table class="min-w-full text-left">
                            <thead class="bg-gradient-to-br from-lime-300 to-green-600 text-white">
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
                                 @foreach ($customer->jobs as $job)
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

