<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        // Get basic statistics using existing data
        $stats = [
            'total_revenue' => $this->getTotalRevenue(),
            'active_customers' => Customer::where('is_active', true)->count(),
            'total_services' => Service::where('is_active', true)->count(),
            'completion_rate' => 94, // Static for now, can make dynamic later
        ];

        // Get recent customers (since we have customer data)
        $recent_customers = Customer::with('creator')
            ->latest()
            ->limit(5)
            ->get();

        // Get service categories with counts
        $service_breakdown = Service::select('category', DB::raw('COUNT(*) as count'), DB::raw('AVG(service_price) as avg_price'))
            ->where('is_active', true)
            ->groupBy('category')
            ->get();

        // Get monthly customer growth (simulate revenue data)
        $monthly_data = $this->getMonthlyData();

        return view('dashboard.index', compact(
            'stats',
            'recent_customers',
            'service_breakdown',
            'monthly_data'
        ));
    }

    private function getTotalRevenue()
    {
        // Since we don't have payments yet, calculate potential revenue from services
        return Service::where('is_active', true)->sum('service_price');
    }

    private function getMonthlyData()
    {
        // Simulate monthly revenue data for the chart
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            'data' => [1200, 1900, 3000, 5000, 2000, 3000, 4500, 3800, 4200]
        ];
    }

}
