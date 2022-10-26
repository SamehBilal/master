<?php

namespace App\Imports;

use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\User;
use App\Notifications\NewOrder;
use App\Notifications\UpdatedOrder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Concerns\ToCollection;

class ThirdSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $user = User::find(auth()->user()->id);
        foreach ($collection->skip(2) as $row)
        {
            DB::beginTransaction();
            try {
                $tracking_no                        = random_int(100000, 999999);
                $phone                              = $row[1];
                $payment                            = 'cash';
                $other_phone                        = $row[2];
                $full_name                          = explode(" ",$row[0]);
                $first_name                         = $full_name[0];
                if(count($full_name) > 1){
                    $last_name = $full_name[1];
                }else{
                    $last_name = '';
                }
                $email                              = $full_name[0].$tracking_no.'@droplin.com';
                $full_name                          = $row[0];

                $client = Client::create([
                    'first_name'                => $first_name,
                    'last_name'                 => $last_name,
                    'full_name'                 => $first_name.' '.$last_name,
                    'email'                     => $email,
                    'other_email'               => null,
                    'user_category_id'          => null,
                    'payment'                   => $payment,
                    'status'                    => 'active',
                    'note'                      => null,
                    'other_phone'               => $other_phone,
                    'phone'                     => $phone,
                    'business_user_id'          => $user->id,
                ]);

                $location = $client->location()->create([
                    'name'                  => $row[8].', '.$row[6].', '.$row[5],
                    'street'                => $row[5],
                    'building'              => $row[6],
                    'floor'                 => $row[7],
                    'apartment'             => $row[8],
                    'country_id'            => 64,
                    'state_id'              => 1200,
                    'city_id'               => 1300,
                    /*'state_id'            => $row[3],
                    'city_id'               => $row[4],*/
                    'business_user_id'      => $user->id,
                ]);

                switch($row[12])
                {
                    case 'Deliver';
                        if($row[22] == 'Heavy Bulky'){
                            $light_bulky = 'heavy bulky';
                            $package_type = 'bulky';
                        }elseif($row[22] == 'Light Bulky'){
                            $light_bulky = 'light bulky';
                            $package_type = 'bulky';
                        }else{
                            $package_type = $row[22];
                        }
                        $order = Order::create([
                            'type'                                  => $row[12],
                            'tracking_no'                           => $tracking_no,
                            'with_cash_collection'                  => $row[13] ? 'with cash collection':NULL,
                            'cash_on_delivery'                      => $row[13],
                            'package_type'                          => $package_type,
                            'light_bulky'                           => $light_bulky,
                            'package_description'                   => $row[15],
                            'no_of_items'                           => $row[14],
                            'order_reference'                       => $row[16],
                            'open_package'                          => $row[17],
                            'delivery_notes'                        => $row[10],
                            'client_id'                             => $client->id,
                            'customer_id'                           => $user->customer ? $user->customer->id:null,
                            'location_id'                           => $location->id,
                            'business_user_id'                      => $user->id,
                        ]);

                        break;
                    case 'Exchange';

                        $order = Order::create([
                            'type'                                  => $row[12],
                            'tracking_no'                           => $tracking_no,
                            'with_cash_difference'                  => $row[13] ? 'with cash difference':NULL,
                            'cash_exchange_amount'                  => $row[13],
                            'no_of_items_exchange'                  => $row[14],
                            'package_description_exchange'          => $row[15],
                            'order_reference_exchange'              => $row[16],
                            'allow_opening'                         => $row[17],
                            'no_of_items_of_return_package_exchange'=> $row[19],
                            'package_description_return_package_exchange'=> $row[20],
                            'return_location_exchange'              => $location->id,
                            'delivery_notes'                        => $row[10],
                            'client_id'                             => $client->id,
                            'customer_id'                           => $user->customer ? $user->customer->id:null,
                            'location_id'                           => $location->id,
                            'business_user_id'                      => $user->id,
                        ]);

                        break;
                    case 'Return';

                        $order = Order::create([
                            'type'                                  => $row[12],
                            'tracking_no'                           => $tracking_no,
                            'refund_amount'                         => $row[13],
                            'with_refund'                           => $row[13] ? 'with refund':NULL,
                            'no_of_items_return'                    => $row[14],
                            'package_description_return'            => $row[15],
                            'order_reference_return'                => $row[16],
                            'return_location'                       => $location->id,
                            'delivery_notes'                        => $row[10],
                            'client_id'                             => $client->id,
                            'customer_id'                           => $user->customer ? $user->customer->id:null,
                            'location_id'                           => $location->id,
                            'business_user_id'                      => $user->id,
                        ]);
                        break;
                    case 'Cash Collection';
                        $order = Order::create([
                            'type'                                  => $row[12],
                            'tracking_no'                           => $tracking_no,
                            'cash_to_collect'                       => $row[13],
                            'collect_cash'                          => $row[13] ? 'collect cash':NULL,
                            'order_reference_cash_collection'       => $row[16],
                            'delivery_notes'                        => $row[10],
                            'client_id'                             => $client->id,
                            'customer_id'                           => $user->customer ? $user->customer->id:null,
                            'location_id'                           => $location->id,
                            'business_user_id'                      => $user->id,
                        ]);
                        break;
                }

                $log = $order->log()->create([
                    'status'                  => 'New',
                    'description'             => 'It is expected to be pickup your order at pickup date.',
                    'notes'                   =>  NULL,
                ]);

                $order->customerlog()->create([
                    'status'                  => 'New',
                    'description'             => 'It is expected to be pickup your order at pickup date.',
                    'notes'                   => NULL,
                ]);

                DB::commit();

                $users = User::whereHas("roles", function($q){ $q->where("name")->orWhere("name", "admin"); })->get();
                Notification::send($users, new NewOrder($order));

            } catch (\Exception $ex) {

                DB::rollback();
                return redirect()->back()->withErrors($ex->getMessage());
            }
        }
    }
}
