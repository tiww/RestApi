<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\ServicesOrderModel;
use App\Models\TreatmentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['title'] = 'Check Out';
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('front.checkout.co', $data)
            ->with('cart_data', $cart_data);
    }

    public function done()
    {
        return view('front.checkout.thanks');
    }

    public function store(Request $request)
    {
        if (isset($_POST['place_order'])) {
            // return "ini nii";

            //user data
            $user_id = Auth::id();
            $user = User::find($user_id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->phone_n = $request->input('phone_n');
            $user->save();

            // placing order
            $track_no = rand(1111, 9999);
            $pay_id = rand(111111, 999999);
            $order = new OrderModel;

            if ($request->hasFile('invoice')) {
                $file = $request->file('invoice');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/img/invoice/', $filename);
                $order->invoice = $filename;
            }

            $order->user_id = $user_id;
            $order->tracking_no = 'treatment-' . $track_no;
            $order->tracking_msg = "";
            // $order->payment_id = 'ID-' . $pay_id;
            $order->order_status = "0";
            $order->notify = "0";
            $order->save();

            $last_orderid = $order->id;

            //order cart items
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $item_in_cart = $cart_data;

            foreach ($item_in_cart as $item) {
                $products = TreatmentModel::find($item['item_id']);
                $price_value = $products->price_t;
                ServicesOrderModel::create([
                    'order_id' => $last_orderid,
                    'treatment_id' => $item['item_id'],
                    'price' => $price_value,
                    'quantity' => $item['item_quantity'],
                ]);
            }

            Cookie::queue(Cookie::forget('shopping_cart'));
            return redirect('/thank_you')->with('status', 'Order Successfuly');
        }
    }
}
