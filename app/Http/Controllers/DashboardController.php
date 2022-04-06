<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        if(auth()->user()->hasRole('Super Admin'))
        {
            return $this->admin();

        }elseif(auth()->user()->hasRole('admin')){

            return $this->admin();

        }elseif(auth()->user()->hasRole('sales')){

            return $this->sales();

        }elseif(auth()->user()->hasRole('finance')){

            return $this->finance();

        }elseif(auth()->user()->hasRole('operation admin')){

            return $this->operation_admin();

        }elseif(auth()->user()->hasRole('operation logistics')){

            return $this->operation_logistics();

        }elseif(auth()->user()->hasRole('operation courier')){

            return $this->operation_courier();

        }elseif(auth()->user()->hasRole('customer')){

            return $this->customer();

        }else{
            return "";
        }

    }

    public function admin()
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

    public function sales()
    {
        $orders = Order::all();
        return view('dashboard.sales',compact('orders'));
    }

    public function customer()
    {
        $orders = Order::all();
        return view('dashboard.customer',compact('orders'));
    }

    public function finance()
    {
        $orders = Order::all();
        return view('dashboard.finance',compact('orders'));
    }

    public function operation_admin()
    {
        $orders = Order::all();
        return view('dashboard.operation_admin',compact('orders'));
    }

    public function operation_logistics()
    {
        $orders = Order::all();
        return view('dashboard.operation_logistics',compact('orders'));
    }

    public function operation_courier()
    {
        $orders = Order::all();
        return view('dashboard.operation_courier',compact('orders'));
    }
}
