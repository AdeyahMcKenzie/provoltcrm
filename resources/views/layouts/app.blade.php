{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ProVoltCRM')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide/dist/lucide.min.js"></script>
    <script>lucide.replace()</script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .sidebar-active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        /* Add any additional styles here */
        @yield('styles')
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 fixed h-full overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                        <i data-lucide="zap" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">ProVolt</h1>
                        <p class="text-xs text-gray-500">CRM Dashboard</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('customers.index') }}" class="{{ request()->routeIs('customers.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span>Customers</span>
                </a>
                <a href="{{ route('vehicles.index') }}" class="{{ request()->routeIs('vehicles.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="car" class="w-5 h-5"></i>
                    <span>Vehicles</span>
                </a>
                <a href="{{ route('jobs.index') }}" class="{{ request()->routeIs('jobs.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="clipboard-list" class="w-5 h-5"></i>
                    <span>Jobs</span>
                </a>
                <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('quotes.index') }}" class="{{ request()->routeIs('quotes.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                    <span>Quotes</span>
                </a>
                <a href="{{ route('payments.index') }}" class="{{ request()->routeIs('payments.*') ? 'sidebar-active' : 'text-gray-600 hover:bg-gray-100' }} flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i data-lucide="credit-card" class="w-5 h-5"></i>
                    <span>Payments</span>
                </a>
                
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-8">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 w-full">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-600">@yield('page-description', 'Welcome back! Here\'s what\'s happening at your shop.')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span>{{ now()->format('M d, Y') }}</span>
                        </div>
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-medium">
                            {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->surname, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Add hover effects
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
        
        // Additional scripts
        @yield('scripts')
    </script>
</body>
</html>