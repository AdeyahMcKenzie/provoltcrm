{{-- resources/views/jobs/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Jobs - ProVoltCRM')
@section('page-title', 'Create a New Job')
@section('page-description', 'Create jobs.')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-8 ">
    <!-- Job Sheet -->
    <div class="col-span-1 md:col-span-6 md:col-start-2 bg-white rounded-2xl p-6 card-shadow drop-shadow-xl card-hover object-center md:mt-10  min-w-full">
        <h1 class="text-2xl"> Create a New Job </h1>
        <!--Top Row : Customer Info Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 mt-10">
            <div class="col-span-1">
            </div>      
        </div>
        <!-- Second Row : Vehicle Info Section  -->
        <div class="mt-10 overflow-auto">
            
             
        </div>
        <!-- Third Row : Customer Complaint -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-10">
            <div class="col-span-1">
                <h2 class="font-medium"> Customer Complaint </h2>
                <div class="border rounded-lg w-full h-48">
                    <p class="text-wrap p-4">{{$job->customer_complaint ?? "None given"}}</p>
                </div>
                
            </div>
            <div class="col-span-1">
                <h2 class="font-medium"> Diagnostic Notes </h2>
                <div class="border rounded-lg w-full h-48">
                    <p class="text-wrap p-4">{{$job->diagnosis_notes}}</p>
                </div>
            </div>
        </div>
        <!-- Fourth Row: Services (Work done on the job)-->
        <div class=" mt-10">
        <table class="min-w-full text-left ">
                <!-- Table Headers -->
                <thead class="bg-sky-900 text-white">
                    <tr>
                        <th class="px-4 py-2 rounded-tl-lg">Service</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th class="px-4 py-2 rounded-tr-lg">Price</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @foreach($job->services as $service)
                        <tr class="hover:bg-gray-50">
                            <!-- Access name and description directly -->
                            <td class="border px-4 py-2">{{ $service->service_name }}</td>
                            <td class="border px-4 py-2">{{ $service->description ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $service->pivot->quantity }}</td>
                            <td class="border px-4 py-2">{{ $service->pivot->service_price }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class=" mt-10">
            
        </div>
    </div>
</div>
@endsection
