<?php

namespace App\Http\Controllers;

use App\Models\OrderLog;
use App\Models\OrdersCouriers;
use App\Models\Pickup;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;

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
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];

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
            $query->whereHas('roles', function ($query) {
                        $query->whereIn('name',['customer']);
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
                                            , 'customersCount', 'customersStatistics','types'));
    }

    public function sales()
    {
        $orders  = Order::all();
        $pickups = Pickup::all();
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];
        return view('dashboard.sales',compact('orders','pickups','types'));
    }

    public function customer()
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $orders = Order::where('business_user_id', $user->id)->orderBy('created_at','desc')->paginate(10);
        }
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];

        $sum  = [
            '01' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '01')->sum('cash_on_delivery'),
            '02' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '02')->sum('cash_on_delivery'),
            '03' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '03')->sum('cash_on_delivery'),
            '04' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '04')->sum('cash_on_delivery'),
            '05' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '05')->sum('cash_on_delivery'),
            '06' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '06')->sum('cash_on_delivery'),
            '07' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '07')->sum('cash_on_delivery'),
            '08' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '08')->sum('cash_on_delivery'),
            '09' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '09')->sum('cash_on_delivery'),
            '10' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '10')->sum('cash_on_delivery'),
            '11' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '11')->sum('cash_on_delivery'),
            '12' => Order::where('business_user_id', $user->id)->whereMonth('created_at', '12')->sum('cash_on_delivery'),
        ];

        $max_graph = max($sum);

        return view('dashboard.customer',compact('orders','types','sum','max_graph'));
    }

    public function finance()
    {
        $orders = Order::all();
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];
        return view('dashboard.finance',compact('orders','types'));
    }

    public function operation_admin()
    {
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];
        $orders = Order::all();
        return view('dashboard.operation_admin',compact('orders','types'));
    }

    public function operation_logistics()
    {
        $orders = Order::all();
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
        ];
        return view('dashboard.operation_logistics',compact('orders','types'));
    }

    public function operation_courier()
    {
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
            ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
            ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
            ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
            ],
            'One Time' => [
                'name'          => 'One Time',
                'image'         => 'one_time.png',
                'description'   => 'One Time',
                'color'         => 'success',
            ],
            'Daily' => [
                'name'          => 'Daily',
                'image'         => 'daily.png',
                'description'   => 'Daily',
                'color'         => 'info',
            ],
            'Weekly' => [
                'name'          => 'Weekly',
                'image'         => 'weekly.png',
                'description'   => 'Weekly',
                'color'         => 'accent',
            ],
        ];

        $orders     = Order::whereHas("courier", function($q){ $q->where("courier_id", auth()->user()->id); });
        $porders    = Order::whereHas("courier", function($q){ $q->where("courier_id", auth()->user()->id); })->paginate(5);
        $pickups    = Pickup::whereHas("courier", function($q){ $q->where("courier_id", auth()->user()->id); });
        $ppickups   = Pickup::whereHas("courier", function($q){ $q->where("courier_id", auth()->user()->id); })->paginate(5);
        return view('dashboard.operation_courier',compact('orders','porders','types','pickups','ppickups'));
    }
}
