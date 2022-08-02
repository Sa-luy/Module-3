<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart($id)
    {
        try {
            $product = Product::find($id);

            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += 1;
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'image'=> $product->image,
                    'price' => $product->price,
                    'quantity' => 1
                ];
            }
            session()->put('cart', $cart);
            return session()->get('cart');
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            return response()->json(['error' => 'failed'],500);
        }
        
    }
    public function showCart()
    {
        $carts= (session()->get('cart'));
        return view('fronten.showCart', compact('carts'));
        // echo '<pre>';
        // print_r($items);
        // die();
    }
    public function updateToCart(Request $request)
    {
        if($request->id && $request->quantity){
            $carts= session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$carts);
            $carts= session()->get('cart');
            // return response()->json(['cart'=>$carts],200);
            $cartComponent = view('components.cart_show',compact('carts'))->render();
            return response()->json(['cartComponent'=>$cartComponent,'code'=>200],200);
        }
    }
    public function deleteToCart(Request $request){
        if($request->id){
            $carts= session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts= session()->get('cart');
            // return response()->json(['cart'=>$carts],200);
            $cartComponent = view('components.cart_show',compact('carts'))->render();
            return response()->json(['cartComponent'=>$cartComponent,'code'=>200],200);
        }
    }
}
