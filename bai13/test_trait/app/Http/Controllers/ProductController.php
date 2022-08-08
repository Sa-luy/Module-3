<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function getSearch()
    {
        return view('search-advance');
    } 

    public function getProductSearch(Request $request)
    {
        $product = Product::query();

        if ($request->has('name')) {
            $product->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->has('status')) {
            $product->where('status', $request->status);
        }
        if ($request->has('type')) {
            $product->where('type', $request->type);
        }

        if ($request->has('price')) {
            $product->where('price', $request->price);
        }

        $products =  $product->get();
        dd($products);
        return response()->json( ['products' => $products],200);
        // return view('search-product_result',);
    }

}
