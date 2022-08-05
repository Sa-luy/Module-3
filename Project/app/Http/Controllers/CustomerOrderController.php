<?php

namespace App\Http\Controllers;

use App\Models\Oder_detail;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerOrderController extends Controller
{
    function customerOrder(Request $request)

    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        try {
            $order = new Order();
            $order->customer_id = Auth::guard('customer')->user()->id;
            $order->address = $request->address;
            $order->fullname = $request->fullname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->notes = 'Giao nhanh';
            $order->order_date = date("Y-m-d");
            $order->totalmoney = $request->totalAll;
            $order->save();
            foreach ($request->product_id as $key =>$product_id) {
                $product = Product::findOrFail($request->product_id);
            //    echo ($product[$key]->amouth);
                if ($order) {
                    // for ($i = 0; $i < count($request->product_id); $i++) {
                        if ($product[$key]->amouth >= $request->quantity[$key]) {
                            $order_detail = new Oder_detail();
                            $order_detail->order_id = $order->id;
                            $order_detail->product_id = $request->product_id[$key];
                            $order_detail->quatity = $request->quantity[$key];
                            $order_detail->price = $request->price[$key];
                            $order_detail->total_money = $request->total;
                            $order_detail->save();
                        } else {
                            session::flash('errors', "Sản phẩm $product->name không đủ sổ lượng thanh toán");
                            return redirect()->route('customer.home');
                        }
                    // }
                    Session::forget('cart');
                }
            }
            Session::flash('messages', 'Đặt hàng thành công');
            return redirect()->back();
        } catch (Exception $e) {
            Log::error('error' . $e->getMessage() . 'line________' . $e->getLine() . 'file___' . $e->getFile());
            Session::flash('errors', 'Error !!!. please try again.');
            dd(111);
            return redirect()->back();
        }
    }
}
