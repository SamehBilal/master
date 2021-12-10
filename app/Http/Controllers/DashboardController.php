<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // orders
        $ordersCount = Order::count();
        $ordersAVG = Order::avg('cash_on_delivery');
        $orders = Order::orderBy('created_at','desc')->paginate(5);

        $ordersQueryFilter = Order::whereYear('created_at', Carbon::now()->year);

        $current_month_orders  = $ordersQueryFilter->whereMonth('created_at', Carbon::now()->month)->count();
        $before_1_month_orders = $ordersQueryFilter->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $before_2_month_orders = $ordersQueryFilter->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
        $before_3_month_orders = $ordersQueryFilter->whereMonth('created_at', Carbon::now()->subMonth(3))->count();
        $before_4_month_orders = $ordersQueryFilter->whereMonth('created_at', Carbon::now()->subMonth(4))->count();
        $ordersStatistics = array($current_month_orders, $before_1_month_orders, $before_2_month_orders, $before_3_month_orders, $before_4_month_orders);

        $current_month_ordersAVG  = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->avg('cash_on_delivery');
        $before_1_month_ordersAVG = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->avg('cash_on_delivery');
        $before_2_month_ordersAVG = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->avg('cash_on_delivery');
        $before_3_month_ordersAVG = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(3))->avg('cash_on_delivery');
        $before_4_month_ordersAVG = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(4))->avg('cash_on_delivery');
        $ordersAVGStatistics = array($current_month_ordersAVG, $before_1_month_ordersAVG, $before_2_month_ordersAVG, $before_3_month_ordersAVG, $before_4_month_ordersAVG);

        // tickets
        $openTicketsCount = Ticket::where('status',1)->count();
        $closedTicketsCount = Ticket::whereIn('status',[2,3])->count();

        // customers
        $usersQueryFilter = User::where(function ($query) {
            $query->whereDoesntHave('roles')
                    ->orWhereHas('roles', function ($query) {
                        $query->whereNotIn('name',['Super Admin', 'admin', 'staff']);
                    });
        });
        
        $customersCount = $usersQueryFilter->count();

        $current_month_customers = $usersQueryFilter->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
        $before_1_month_customers = $usersQueryFilter->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->subMonth(1))
                ->count();
        $before_2_month_customers = $usersQueryFilter->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->subMonth(2))
                ->count();
        $before_3_month_customers = $usersQueryFilter->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->subMonth(3))
                ->count();
        $before_4_month_customers = $usersQueryFilter->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->subMonth(4))
                ->count();
        $customersStatistics = array($current_month_customers, $before_1_month_customers, $before_2_month_customers, $before_3_month_customers, $before_4_month_customers);        


        return view('dashboard.admin',compact('ordersCount','ordersAVG','orders','ordersStatistics','ordersAVGStatistics'
                                            , 'openTicketsCount', 'closedTicketsCount'
                                            , 'customersCount', 'customersStatistics'));
    }
    
}
