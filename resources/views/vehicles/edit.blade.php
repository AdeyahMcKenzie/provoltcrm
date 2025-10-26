{{-- resources/views/vehicles/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Customers - ProVoltCRM')
@section('page-title', 'Update Vehicle Records')
@section('page-description', 'Update vehicle records.')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-8 ">
    <!-- Create Vehicle Card -->
    <div class="col-span-1 md:col-span-6 md:col-start-2 bg-white rounded-2xl p-6 card-shadow drop-shadow-xl card-hover object-center md:mt-20  min-w-full ">
        <div class=" mb-4">
            <div class="flex justify-start items-left mb-3">
                <!-- Return button-->
                <a href="{{ route('vehicles.index') }}" >
                    <i data-lucide="arrow-left" class="w-8 h-8 "> </i>     
                </a>
                <span class="pt-1 ">Back</span>
                
                
            </div>
            <h2 class="text-lg font-medium text-left"> 
                Update a Vehicle Record
            </h2>
            <p class="ml-4 pt-4 text-sm"> All fields marked with <span class="text-red-500">*</span> are required. </p>
            <!-- Register vehicle form-->           
            <form action="{{ route('vehicles.update', $vehicle->registration_number) }}" method="POST">
                @csrf
                @method ('PATCH')
                <!-- Align Form Contents -->
                <div class="flex justify-center m-5 pt-5">
                    <div class="w-full max-w-6xl">

                        <!-- 3 Column Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 ">
                
                            <!-- LEFT COLUMN; -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Registration Number-->
                                <div>
                                    <label for="registration_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Registration Number <span class="text-red-500">*</span>
                                    </label>
                                            <input type="text" name="registration_number" id="registration_number" placeholder="XA540" value="{{$vehicle->registration_number}}"class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!--Vehicle Owner--> 
                                <div>
                                    <label for="owner" class="block text-sm font-medium text-gray-700 mb-2">
                                        Registered Owner <span class="text-red-500">*</span>
                                    </label>
                                    <!--Autocomplete text input -->
                                    <input type="text" id="customer_search" 
                                    value="{{$vehicle->owner->first_name}} {{$vehicle->owner->surname}}" 
                                    autocomplete="off" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500" required>
                
                                    <input type="hidden" name="owner_id" id="owner_id" value="{{$vehicle->owner_id}}" required>
                                    
                                    <!-- Hidden Div (Only Shows When Results Load) -->
                                    <div id="customer_results" class="hidden absolute z-10 w-80 mt-1 bg-white border border-gray-300 rounded-lg                     shadow-lg max-h-60 overflow-y-auto">
                                        <!-- Results will be within this div -->
                                    </div>

                                </div>
                                <!-- Make -->
                                <div>
                                    <label for="make" class="block text-sm font-medium text-gray-700 mb-2">
                                        Make <span class="text-red-500">*</span>
                                    </label>
                                            <input type="text" name="make" id="make" value="{{$vehicle->make}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!--Model-->
                                <div>
                                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">
                                        Model <span class="text-red-500">*</span>
                                    </label>
                                            <input type="text" name="model" id="model" value="{{$vehicle->model}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                               
                            </div>
                            <!-- MIDDLE COLUMN; -->
                            <div class="col-span-1 md:col-span-2 space-y-6">
                                <!--Year-->
                                <div>
                                    <label for="year" class="block text-sm font-medium text-gray-700 mb-2">
                                        Year <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="year" id="year"  value="{{$vehicle->year}}" min="1980" max="2025" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!-- Colour -->
                                <div>
                                    <label for="colour" class="block text-sm font-medium text-gray-700 mb-2">
                                        Colour
                                    </label>
                                    <input type="text" name="colour" id="colour"  value="{{$vehicle->colour ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- Mileage -->
                                <div>
                                    <label for="mileage" class="block text-sm font-medium text-gray-700 mb-2">
                                        Mileage
                                    </label>
                                    <input type="number" name="mileage" id="mileage" placeholder="12000"  
                                    value="{{$vehicle->mileage ?? '' }}"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- VIN -->
                                <div>
                                    <label for="vin" class="block text-sm font-medium text-gray-700 mb-2">
                                        VIN
                                    </label>
                                    <input type="text" name="vin_number" id="vin_number"  placeholder="YH0S5ZNH20D75RXTC" 
                                    value="{{$vehicle->vin_number ?? '' }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- RIGHT COLUMN;  -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Engine Type-->
                                <div>
                                    <label for="engine_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Engine Type <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="engine_type" id="engine_type" placeholder="V8" value="{{$vehicle->engine_type ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                            
                                </div>
                                                                 
                                 <!--Fuel Type-->
                                <div>
                                    <label for="fuel_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Fuel Type <span class="text-red-500">*</span>
                                    </label>
                                        <!-- Arry of Fuel Types-->
                                        @php
                                            $fuel_types = ['Diesel', 'Petrol'];
                                        @endphp
                                    
                                        <select name="fuel_type" id="fuel_type"  class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                            <!-- Set the fuel type to match the vehicle record -->
                                            @foreach ($fuel_types as $fuel_type)
                                                <option value="{{ $fuel_type }}" 
                                                    {{ old('fuel_type', $vehicle->fuel_type) === $fuel_type ? 'selected' :      '' }}>
                                                        {{ $fuel_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    
                                </div>
                                <!--Transmission-->
                                <div>
                                    <label for="transmission" class="block text-sm font-medium text-gray-700 mb-2">
                                        Transmission <span class="text-red-500">*</span>
                                    </label>
                                    <!-- Arry of Transmission Types-->
                                        @php
                                            $transmission_types = ['Automatic', 'Manual'];
                                        @endphp
                                    <select name="transmission" id="transmission"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                                 <!-- Set the fuel type to match the vehicle record -->
                                            @foreach ($transmission_types as $transmission)
                                                <option value="{{ $transmission }}" 
                                                    {{ old('transmission', $vehicle->transmission) === $transmission ? 'selected' :      '' }}>
                                                        {{ $transmission }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                 <!-- Description -->
                                 <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                        Description
                                    </label>
                                    <textarea name="description" id="description" placeholder="Write a brief description about the vehicle here"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">{{$vehicle->description ?? '' }}</textarea>
                                </div>
                                
                            </div>
                        
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-center gap-4 mt-8">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg">
                                Save
                            </button>
                            <a href="{{ route('vehicles.index') }}" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg text-center">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
@section('scripts')

    //variable declaration
    const searchInput = document.getElementById('customer_search');//get value from the input field
    const resultsDiv = document.getElementById('customer_results');
    const ownerIdInput = document.getElementById('owner_id');
    let debounceTimer;
    
    // search for customers as user types
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);// clear the current debounce timer
        const query = this.value.trim(); //store user input (use trim to remove spaces)
        
        //exit function if input is less than 2 characters
        if (query.length < 2) {
            resultsDiv.classList.add('hidden');
            return;
        }
        
        // debounce - wait 300ms after user stops typing
        debounceTimer = setTimeout(() => {
            searchCustomers(query);
        }, 300);
    });
    
    // Fetch customers from API
    function searchCustomers(query) {
        fetch(`/api/customers/search?query=${encodeURIComponent(query)}`)
            .then(response => response.json()) //convert json from the API to an array
            .then(customers => {
                displayResults(customers);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    
    // Display search results
    function displayResults(customers) {
        if (customers.length === 0) {
            //Alter innerHTML to show "No customers" message
            resultsDiv.innerHTML = '<div class="px-4 py-3 text-gray-500 text-sm">No customers found</div>';
            resultsDiv.classList.remove('hidden'); //make the element visible
            return;
        }
        
        
        let html = '';
        customers.forEach(customer => {
            //amend the output to the html variable
            html += `
                <div class="px-4 py-3 hover:bg-purple-50 cursor-pointer border-b last:border-b-0 customer-item"
                     data-id="${customer.customer_id}"
                     data-name="${customer.first_name} ${customer.surname}">
                    <div class="font-medium text-gray-800">${customer.first_name} ${customer.surname}</div>
                </div>
            `;
        });
        
        resultsDiv.innerHTML = html;
        resultsDiv.classList.remove('hidden');
        
        // detect when user selects a customer
        document.querySelectorAll('.customer-item').forEach(item => {
            item.addEventListener('click', function() {
                selectCustomer(this.dataset.id, this.dataset.name);
            });
        });
    }
    
    // capture the data from user selection & close dropdown
    function selectCustomer(customerId, customerName) {
        searchInput.value = customerName;
        ownerIdInput.value = customerId;
        resultsDiv.classList.add('hidden');
    }
    
    // close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !resultsDiv.contains(e.target)) {
            resultsDiv.classList.add('hidden');
        }
    });
    
    // show dropdown when input is focused (if has value)
    searchInput.addEventListener('focus', function() {
        if (this.value.length >= 2) {
            searchCustomers(this.value);
        }
    });

@endsection
