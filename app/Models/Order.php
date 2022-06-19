<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getStatusColorAttribute()
    {
        switch($this->attributes['status']){
            case 'New':
                return "badge-primary";
            case 'Awaiting your action':
                return "badge-warning";
            case 'On hold':
                return "badge-info";
            case 'Canceled':
                return "badge-secondary";
            case 'Rescheduled':
                return "badge-accent";
            case 'Out for delivery':
                return "badge-dark";
            case 'Completed':
                return "badge-success";
            case 'Return to origin':
                return "badge-secondary";
            case 'Cannot be delivered':
                return "badge-danger";
            default:
                return "badge-danger";
        }
    }

    public function customer()
    {
        return $this->hasOne(Customer::class  , "id" , "customer_id");
    }

    public function business()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public function couriers()
    {
        return $this->hasMany(OrdersCouriers::class)->orderByDesc('updated_at');
    }

    public function courier()
    {
        return $this->belongsToMany(User::class,'courier_logs','order_id','courier_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }

    public function return_locations()
    {
        return $this->hasOne(Location::class  , "id" , "return_location");
    }

    public function return_locations_exchange()
    {
        return $this->hasOne(Location::class  , "id" , "return_location_exchange");
    }

    public function pickup()
    {
        return $this->hasOne(Pickup::class  , "id" , "pickup_id");
    }

    public function log()
    {
        return $this->hasMany(OrderLog::class)->orderByDesc('updated_at');
    }

    public static function attrs()
    {
        return [
            'tracking_no'                                   => "Tracking Number",
            'type'                                          => 'Type',
            'delivery_notes'                                => "Delivery Notes",
            'status'                                        => 'Status',
            'customer_id'                                   => "Customer",
            'pickup_id'                                     => "Pickup",
            'business_user_id'                              => "Business User",
            'location_id'                                   => "Location",

            'return_location'                               => "Return Location",
            'return_location_exchange'                      => "Exchange Location",

            // Deliver
            'with_cash_collection'                          => "With Cash Collection",
            'cash_on_delivery'                              => "Cash on Delivery",
            'package_type'                                  => "Package Type",
            'light_bulky'                                   => "Light Bulky",
            'package_description'                           => "Package Description",
            'no_of_items'                                   => "Number of Items",
            'order_reference'                               => "Order Reference",
            'working_hours'                                 => "Working Hours",
            'open_package'                                  => "Open Package",

            // Exchange
            'cash_exchange_amount'                          => "Cash Exchange Amount",
            'with_cash_difference'                          => "With Cash Difference",
            'no_of_items_exchange'                          => "Number of Exchange Items",
            'package_description_exchange'                  => "package_description_exchange",
            'order_reference_exchange'                      => "order_reference_exchange",
            'allow_opening'                                 => "Allow Opening",
            'no_of_items_of_return_package_exchange'        => "no_of_items_of_return_package_exchange",
            'package_description_return_package_exchange'   => "package_description_return_package_exchange",

            // Return
            'refund_amount'                                 => "Refund Amount",
            'with_refund'                                   => "With Refund",
            'no_of_items_return'                            => "Number of Return Items",
            'package_description_return'                    => "Return Package Description",
            'order_reference_return'                        => "Return Order Reference",

            // Cash Collection
            'cash_to_collect'                               => "Cash to Collect",
            'collect_cash'                                  => "Collect Cash",
            'order_reference_cash_collection'               => "Cash Collection Order Reference",
        ];
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'tracking_no'                                   => "required|max:40|unique:orders,tracking_no,$id",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'tracking_no'                                   => "required|max:40|unique:orders",
            'type'                                          => 'required',Rule::in(['Deliver','Exchange','Return','Cash Collection']),
            'delivery_notes'                                => "nullable",
            'status'                                        => 'nullable',Rule::in(['New','Awaiting your action','On hold','Canceled','Rescheduled','Out for delivery','Completed','Return to origin','Cannot be delivered',]),
            'customer_id'                                   => "required",
            'pickup_id'                                     => "nullable",
            'business_user_id'                              => "nullable",
            'location_id'                                   => "required",

            'return_location'                               => "nullable",
            'return_location_exchange'                      => "nullable",

            // Deliver
            'with_cash_collection'                          => "required_if:type,Deliver",
            'cash_on_delivery'                              => "required_if:type,Deliver",
            'package_type'                                  => "required_if:type,Deliver",
            'light_bulky'                                   => "required_if:type,Deliver",
            'package_description'                           => "required_if:type,Deliver",
            'no_of_items'                                   => "required_if:type,Deliver",
            'order_reference'                               => "required_if:type,Deliver",
            'working_hours'                                 => "required_if:type,Deliver",
            'open_package'                                  => "required_if:type,Deliver",

            // Exchange
            'cash_exchange_amount'                          => "required_if:type,Exchange",
            'with_cash_difference'                          => "required_if:type,Exchange",
            'no_of_items_exchange'                          => "required_if:type,Exchange",
            'package_description_exchange'                  => "required_if:type,Exchange",
            'order_reference_exchange'                      => "required_if:type,Exchange",
            'allow_opening'                                 => "required_if:type,Exchange",
            'no_of_items_of_return_package_exchange'        => "required_if:type,Exchange",
            'package_description_return_package_exchange'   => "required_if:type,Exchange",

            // Return
            'refund_amount'                                 => "required_if:type,Return",
            'with_refund'                                   => "required_if:type,Return",
            'no_of_items_return'                            => "required_if:type,Return",
            'package_description_return'                    => "required_if:type,Return",
            'order_reference_return'                        => "required_if:type,Return",

            // Cash Collection
            'cash_to_collect'                               => "required_if:type,Cash Collection",
            'collect_cash'                                  => "required_if:type,Cash Collection",
            'order_reference_cash_collection'               => "required_if:type,Cash Collection",
        ]);
    }
}
