<?php

namespace App\Http\Controllers;

use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class NotificationsController extends Controller
{
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    public function notify()
    {
        /*$options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = 'hello investmentnovel';
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);*/

        $order = [
            'id' => '1',
        ];
        auth()->user()->notify(new OrderNotification($order));

    }

    public function delete(Request $request) {
        if ($request->ajax()) {
            $id = $request->get('notification');
            $user = Auth::user();
            $notification = $user->notifications()->where('id', $id)->first();
            if ($notification) {
                $notification->update([
                    'read_at' => now(),
                ]);
                //return back();
            } else
                //return back()->withErrors('we could not found the specified notification');

            $data = array(
                'id' => $id,
            );

            echo json_encode($data);
        }
    }

    public function markasread($id){

        Auth::user()->unreadnotifications->markAsRead();
        return redirect()->back();
    }

    public function markasreadajax(Request $request){
        if ($request->ajax()) {
            $id =$request->get('notification');
            $user = Auth::user();
            $user->notifications()->where('id',$id)->first()->markAsRead();
        }

    }
}
