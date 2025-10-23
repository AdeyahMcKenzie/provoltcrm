{{-- resources/views/vehicles/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Customers - ProVoltCRM')
@section('page-title', 'Register Vehicles')
@section('page-description', 'Register new vehicles.')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-8 ">
    <!-- Create Vehicle Card -->
    <div class="col-span-1 md:col-span-6 md:col-start-2 bg-white rounded-2xl p-6 card-shadow drop-shadow-xl card-hover object-center md:mt-20  min-w-full ">
        <div class=" mb-4">
            <h2 class="text-lg font-medium text-left">Register New Vehicle</h2>
            <!-- Register vehicle form-->           
            <form action="{{ route('vehicles.store') }}" method="POST">
                @csrf
                <!-- Align Form Contents -->
                <div class="flex justify-center m-5">
                    <div class="w-full max-w-6xl">

                        <!-- 3 Column Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 ">
                
                            <!-- LEFT COLUMN; -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Registration Number-->
                                <div>
                                    <label for="registration_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Registration Number
                                    </label>
                                            <input type="text" name="registration_number" id="registration_number" placeholder="XA540" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!--Vehicle Owner (SELECT MENU)--> 
                                <div>
                                    <label for="owner" class="block text-sm font-medium text-gray-700 mb-2">
                                        Registered Owner
                                    </label>
                                    <select name="owner" id="owner"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" >
                                        <option value="null"> Choose a parish</option>
                                        <option value="St.Lucy"> St. Lucy </option>
                                        <option value="St.Peter"> St. Peter </option>
                                        <option value="St.Andrew"> St. Andrew </option>
                                        <option value="St.John"> St. John </option>
                                        <option value="St.Joseph"> St. Joseph </option>
                                        <option value="St.James"> St. James </option>
                                        <option value="St.George"> St. George </option>
                                        <option value="St.Thomas"> St. Thomas </option>
                                        <option value="St.Michael"> St. Michael </option>
                                        <option value="St.Phillip"> St. Phillip </option>
                                        <option value="Christ Church"> Christ Church </option>
                                    </select>
                                </div>
                                <!-- Make -->
                                <div>
                                    <label for="make" class="block text-sm font-medium text-gray-700 mb-2">
                                        Make
                                    </label>
                                            <input type="text" name="make" id="make" placeholder="Nissan" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!--Model-->
                                <div>
                                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">
                                        Model
                                    </label>
                                            <input type="text" name="model" id="model" placeholder="Tida" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                               
                            </div>
                            <!-- MIDDLE COLUMN; -->
                            <div class="col-span-1 md:col-span-2 space-y-6">
                                <!--Year-->
                                <div>
                                    <label for="year" class="block text-sm font-medium text-gray-700 mb-2">
                                        Year
                                    </label>
                                    <input type="number" name="year" id="year"  placeholder="2016" min="1980" max="2025" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- Colour -->
                                <div>
                                    <label for="colour" class="block text-sm font-medium text-gray-700 mb-2">
                                        Colour
                                    </label>
                                    <input type="text" name="colour" id="colour"  placeholder="Silver" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- Mileage -->
                                <div>
                                    <label for="mileage" class="block text-sm font-medium text-gray-700 mb-2">
                                        Mileage
                                    </label>
                                    <input type="number" name="mileage" id="mileage"  placeholder="12000"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- VIN -->
                                <div>
                                    <label for="vin" class="block text-sm font-medium text-gray-700 mb-2">
                                        VIN
                                    </label>
                                    <input type="text" name="vin" id="vin"  placeholder="YH0S5ZNH20D75RXTC"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- RIGHT COLUMN;  -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Engine Type-->
                                <div>
                                    <label for="engine_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Engine Type
                                    </label>
                                            <input type="text" name="engine_type" id="engine_type"      placeholder="hybrid" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                 <!--Fuel Type-->
                                <div>
                                    <label for="fuel_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Fuel Type
                                    </label>
                                    <input type="text" name="fuel_type" id="fuel_type" placeholder="gasoline" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                    
                                </div>
                                <!--Transmission-->
                                <div>
                                    <label for="transmission" class="block text-sm font-medium text-gray-700 mb-2">
                                        Transmission
                                    </label>
                                    <input type="text" name="transmission" id="transmission"      placeholder="automatic" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                 <!-- Description -->
                                 <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                        Description
                                    </label>
                                    <textarea name="description" id="description" placeholder="Write a brief description about the vehicle here" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500"></textarea>
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
@endsection