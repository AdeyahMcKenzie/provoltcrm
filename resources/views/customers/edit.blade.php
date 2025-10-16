{{-- resources/views/customers/cedit.blade.php --}}
@extends('layouts.app')

@section('title', 'Customers - ProVoltCRM')
@section('page-title', 'Update Customer')
@section('page-description', 'Update customer information.')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-8 ">
    <!-- Create Customer Card -->
    <div class="col-span-1 md:col-span-6 md:col-start-2 bg-white rounded-2xl p-6 card-shadow drop-shadow-xl card-hover object-center md:mt-20  min-w-full ">
        <div class=" mb-4">
            <h2 class="text-lg font-medium text-left">Update Customer Information</h2>
            <!-- Create customer form-->           
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method ('PATCH')
                <!-- Align Form Contents -->
                <div class="flex justify-center m-5">
                    <div class="w-full max-w-6xl">

                        <!-- 3 Column Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 ">
                
                            <!-- LEFT COLUMN; PERSONAL INFO -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Firstname-->
                                <div>
                                    <label for="firstname" class="block text-sm font-medium text-gray-700 mb-2">
                                        Firstname
                                    </label>
                                            <input type="text" name="first_name" id="first_name" value="{{$customer->first_name}}"    placeholder="Enter customer firstname" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!--Surname-->
                                <div>
                                    <label for="surname" class="block text-sm font-medium text-gray-700 mb-2">
                                        Surname
                                    </label>
                                            <input type="text" name="surname" id="surname"  value="{{$customer->surname}}"       placeholder="Enter customer surname" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                </div>
                                <!-- Notes -->
                                <div>
                                    <label for="province" class="block text-sm font-medium text-gray-700 mb-2">
                                        Notes
                                    </label>
                                    <textarea name="notes" id="notes" value="{{ $customer->notes ?? '' }}" placeholder="Write any notes about the customer here" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500"></textarea>
                                </div>
                               
                            </div>
                            <!-- MIDDLE COLUMN; ADDRESS -->
                            <div class="col-span-1 md:col-span-2 space-y-6">
                                <!-- Street Address-->
                                <div>
                                    <label for="street" class="block text-sm font-medium text-gray-700 mb-2">
                                        Street Address
                                    </label>
                                    <input type="text" name="street_address" id="street_address"  value="{{ $customer->street_address ?? '' }}" placeholder="Enter a street address" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- Province-->
                                <div>
                                    <label for="province" class="block text-sm font-medium text-gray-700 mb-2">
                                        Province
                                    </label>
                                    <input type="text" name="province" id="province"  value="{{ $customer->province ?? '' }}" placeholder="Enter a province" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                <!-- Parish-->
                                <div>
                                    <label for="parish" class="block text-sm font-medium text-gray-700 mb-2">
                                        Parish
                                    </label>
                                    <select name="parish" id="parish"  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500" >
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
                            </div>

                            <!-- RIGHT COLUMN; CONTACT INFO -->
                            <div class="col-span-1 md:col-span-2 space-y-6 ">
                                <!--Email Address-->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address
                                    </label>
                                            <input type="text" name="email_address" id="email_address"  value="{{ $customer->email_address ?? '' }}" placeholder="Enter customer email" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-focus:ring-purple-500">
                                </div>
                                 <!--Contact No-->
                                <div>
                                    <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Contact Number 
                                    </label>
                                    <div class="flex w-full rounded-lg border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-purple-500 overflow-hidden">
                                    <span class="flex items-center bg-gray-100 px-4 text-sm text-gray-700 whitespace-nowrap select-none">
                                        🇧🇧 +1 246
                                        </span>
                                    
                                            <input type="text" name="contact_number" id="contact_number"   value="{{ $customer->contact_number ?? '' }}" placeholder="Enter customer number" class="w-full px-4 py-2 rounded-r-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                    </div>
                                </div>
                                <!--Alternative Contact-->
                                <div>
                                    <label for="alternative_contact" class="block text-sm font-medium text-gray-700 mb-2">
                                        Alternative Contact Number 
                                    </label>
                                    <div class="flex w-full rounded-lg border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-purple-500 overflow-hidden">
                                    <span class="flex items-center bg-gray-100 px-4 text-sm text-gray-700 whitespace-nowrap select-none">
                                        🇧🇧 +1 246
                                        </span>
                                    
                                            <input type="text" name="alternative_contact" id="alternative_contact"        value="{{ $customer->alternative_contact ?? '' }}" placeholder="Enter customer number" class="w-full px-4 py-2 rounded-r-lg shadow-sm focus:ring-focus:ring-purple-500" required>
                                    </div>
                                </div>
                                <!-- Preferred Contact Method-->
                                <div>
                                    <label for="preferred_contact_method" class="block text-sm font-medium text-gray-700 mb-2">
                                        Preferred Contact Method 
                                    </label>
                                    <div class="flex justify-start">
                                    <input type="radio" name="preferred_contact_method" id="pref-email" value="email"
                                    class="size-5 rounded-lg checked:bg-indigo-600 border border-gray-100 mx-5" 
                                    {{ old('preferred_contact_method', $customer->preferred_contact_method ?? '') === 'email' ? 'checked' : '' }} > Email
                                    <input type="radio" name="preferred_contact_method" id="pref-phone" value="phone"
                                    class="size-5 rounded-lg checked:bg-indigo-600 border border-gray-100 mx-5"
                                    {{ old('preferred_contact_method', $customer->preferred_contact_method ?? '') === 'phone' ? 'checked' : '' }} > Phone
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-center gap-4 mt-8">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg">
                                Save
                            </button>
                            <a href="{{ route('customers.index') }}" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg text-center">
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