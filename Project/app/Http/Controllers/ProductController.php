<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('viewAny', Product::class);
        // $user=Auth::user();
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories= Category::all();
        return view('admin.products.add',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request,Product $product)
    {
        dd($request->all());

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amouth = $request->amouth;
        $product->use = $request->use;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        
        if ($request->hasFile('file')) {
            $file = $request->file;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            // $product->image = $newFileName;// cột image gán bằng tên file mới
            $request->file('file')->storeAs('public/images', $newFileName);//lưu file vào mục public/images với tê mới là $newFileName
            $product->image = $newFileName;

        } 

        try {
            $product->save();
            Session::flash('success', 'Thêm Sản phẩm thành công');
            return redirect()->route('product.index');
        } catch (Exception $e) {
            Session::flash('success', 'Thêm Sản phẩm  khong thành công');
            Log::eror('error'.$e->getMessage().'line________'.$e->getLine());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories, $id)
    {
        // $product =  Product::find($id);
        // $products= Product::all();
        // $categories= Category::all();
        // return view('admin.products.show', compact('product','categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $id= $product->id;
       
        $categories= Category::all();
        return view('admin.products.edit',compact('id','product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {

        $product->name = $request->name;
        $product->price = $request->price;
        $product->amouth = $request->amouth;
        $product->use = $request->use;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        
        if ($request->hasFile('file')) {
            $file = $request->file;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            // $product->image = $newFileName;// cột image gán bằng tên file mới
            $request->file('file')->storeAs('public/images', $newFileName);//lưu file vào mục public/images với tê mới là $newFileName
            $product->image = $newFileName;

        }

        try {
            $product->save();
            Session::flash('success', 'chỉnh sửa thành công');
            return redirect()->route('product.index');
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        Session::flash('success', 'Xóa sản phẩm thành công');
        
        return redirect()->back();

    }
}
