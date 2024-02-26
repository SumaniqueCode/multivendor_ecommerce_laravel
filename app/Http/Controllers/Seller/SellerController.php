<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Seller\Product;
use App\Models\User\Order;
use App\Models\viewCounter;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class SellerController extends Controller
{public function dashboard()
    {
        $khaltiOrders = [];
        $cashOrders = [];
        $productClicks = [];
        $CPC=[];
    
        // Get current year, month, and day
        $currentYear = date('Y');
        $currentMonth = date('F');
        $currentDay = date('j');
    
        // Initialize count array for missing days of this year
        $startDateThisYear = Carbon::createFromDate($currentYear)->startOfYear();
        $endDateThisYear = now()->startOfDay(); // Get the current date
        $dateRangeThisYear = CarbonPeriod::create($startDateThisYear, $endDateThisYear);
    
        foreach ($dateRangeThisYear as $date) {
            $year = $date->format('Y');
            $month = $date->format('F'); 
            $day = $date->format('j');
    
            $userCount[$year][$month][$day] = 0;
            $khaltiOrders[$year][$month][$day] = 0;
            $cashOrders[$year][$month][$day] = 0;
            $productClicks[$year][$month][$day] = 0;
            $CPC[$year][$month][$day] = 0;
        }
     
        // Last 7 days
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('F j');
            $last7Days[] = $date;
        }
    
        // Current Month
        $thisMonth = [];
        for ($j = $currentDay - 1; $j >= 0; $j--) {
            $date = now()->subDays($j)->format('F j');
            $thisMonth[] = $date;
        }
    
        // This Year
        $thisYear = [];
        foreach ($dateRangeThisYear as $date) {
            $thisYear[] = $date->format('F j');
        }

        $orders = Order::where('seller_id', auth()->user()->id)->get();

        foreach ($orders as $order) {
            $year = $order->created_at->format('Y');
            $month = $order->created_at->format('F');
            $day = $order->created_at->format('j');

            if ($order->payment_method == 'Khalti') {
                $khaltiOrders[$year][$month][$day] += $order->total_price;
            }
            if ($order->payment_method == 'COD') {
                $cashOrders[$year][$month][$day] += $order->total_price;
            }
        }

        $clicks = viewCounter::where('seller_id', auth()->user()->id)->get();
        foreach ($clicks as $click) {
            $year = $click->created_at->format('Y');
            $month = $click->created_at->format('F');
            $day = $click->created_at->format('j');
            $CPC[$year][$month][$day] += sprintf("%.2f",($khaltiOrders[$year][$month][$day] + $cashOrders[$year][$month][$day])/$click->count);
            $productClicks[$year][$month][$day] += $click->count;
        }
        $weeklyKhaltiOrders = [];
        $weeklyCashOrders = [];
        $weeklySales = [];
        $weeklyClicks = [];
        $weeklyCPC = [];
        foreach ($last7Days as $day) {
            list($month, $day) = explode(' ', $day);
            $weeklyKhaltiOrders[] = $khaltiOrders[$currentYear][$month][$day] ?? 0;
            $weeklyCashOrders[] = $cashOrders[$currentYear][$month][$day] ?? 0;
            $weeklySales[] =  ($khaltiOrders[$currentYear][$month][$day] ?? 0) + ($cashOrders[$currentYear][$month][$day] ?? 0);
            $weeklyClicks[] = $productClicks[$currentYear][$month][$day] ?? 0;
            $weeklyCPC[] = $CPC[$currentYear][$month][$day] ?? 0;
            
        }
        $totalWeeklyOrder =  array_sum($weeklyKhaltiOrders) + array_sum($weeklyCashOrders);
        $totalWeeklyClicks =  array_sum($weeklyClicks);
        $totalWeeklyCPC =  array_sum($weeklyCPC);

        $monthlyKhaltiOrders = [];
        $monthlyCashOrders = [];
        $monthlySales = [];
        $monthlyClicks = [];
        $monthlyCPC = [];
        foreach ($thisMonth as $month) {
            list($month, $day) = explode(' ', $month);
            $monthlyKhaltiOrders[] = $khaltiOrders[$currentYear][$month][$day] ?? 0;
            $monthlyCashOrders[] = $cashOrders[$currentYear][$month][$day] ?? 0;
            $monthlySales[] =  ($khaltiOrders[$currentYear][$month][$day] ?? 0) + ($cashOrders[$currentYear][$month][$day] ?? 0);
            $monthlyClicks[] = $productClicks[$currentYear][$month][$day] ?? 0;
            $monthlyCPC[] = $CPC[$currentYear][$month][$day] ?? 0;
            
        }
        $totalMonthlyOrder =  array_sum($weeklyKhaltiOrders) + array_sum($weeklyCashOrders);
        $totalMonthlyClicks =  array_sum($weeklyClicks);
        $totalMonthlyCPC =  array_sum($weeklyCPC);
        return view("Seller.sellerDashboard", compact(
            'last7Days', 'thisMonth', 'thisYear',
            'weeklyKhaltiOrders', 'weeklyCashOrders', 'totalWeeklyOrder',
            'weeklySales', 'weeklyClicks','totalWeeklyClicks', 'weeklyCPC','totalWeeklyCPC',
            'monthlyKhaltiOrders', 'monthlyCashOrders', 'totalMonthlyOrder',
            'monthlySales', 'monthlyClicks','totalMonthlyClicks', 'monthlyCPC','totalMonthlyCPC'
        ));
    }
    
    


    public function products()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view("Seller.products", compact('products'));
    }

    public function orders()
    {
        return view("Seller.sellerOrders");
    }

    public function profile()
    {
        return view("Seller.sellerProfile");
    }
    public function addProduct()
    {
        $categories = Category::latest()->get();
        return view("Seller.addProduct", compact('categories'));
    }

    public function editProduct($id)
    {
        $categories = Category::latest()->get();
        $products = Product::where('id', $id)->first();
        return view("Seller.editProduct", compact('categories', 'products'));
    }
}
