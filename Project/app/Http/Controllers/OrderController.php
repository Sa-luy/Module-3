<?php

namespace App\Http\Controllers;

use App\Http\Requests\OderRequest;
use App\Models\Order;
use Carbon\Carbon;
use Exception;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
        $order_total = Order::latest()->paginate(5);
        $param = [
            'orders' => $orders,
            'order_total' => $order_total
        ];
        // dd(count($orders));
        return view('admin.orders.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OderRequest $request)
    {

        try {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->address = $request->address;
            $order->fullname = $request->fullname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->order_date = date("Y-m-d");
            $order->notes = $request->notes;
            $order->status = $request->status;
            $order->totalmoney = $request->totalmoney;
            $order->save();
            Session::flash('messages', 'successfully');
            return redirect()->route('order.index');
        } catch (Exception $e) {
            Log::error('error' . $e->getMessage() . 'line________' . $e->getLine());
            Session::flash('success', 'Error !!!. please try again.');
            dd(111);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $param = [
            'order' => $order
        ];
        return view('admin.orders.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $param = [
            'order' => $order
        ];
        return view('admin.orders.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OderRequest $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->user_id = Auth::user()->id;
            $order->address = $request->address;
            $order->fullname = $request->fullname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->order_date = date("Y-m-d");
            $order->notes = $request->notes;
            $order->status = $request->status;
            $order->totalmoney = $request->totalmoney;
            $order->save();
            Session::flash('messages', 'successfully');
            return redirect()->route('order.index');
        } catch (Exception $e) {
            Log::error('error' . $e->getMessage() . 'line________' . $e->getLine());
            Session::flash('messages', 'Error !!!. please try again.');
            dd(111);
            return redirect()->route('order.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->id;
            $order = Order::findOrFail($id);
            // return response()->json($category);
            $order->delete();
            DB::commit();
            $messages = 'Deleted successfully.' . $order->name;
            return response()->json([
                'messages' => $messages,
                'status' => 1
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . 'line________' . $e->getLine());
            $messages = 'Deleted errors!!!please try again.';
            return response()->json([
                'messages' => $messages,
                'status' => 0
            ], 200);
        }
    }
    public function trashed()
    {
        $orders_trasheds = Order::onlyTrashed()->get();
        return view('admin.orders.recycleBin', compact('orders_trasheds'));
    }
}
