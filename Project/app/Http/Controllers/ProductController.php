<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
    
        $this->authorize('viewAny', Product::class);
       
        $products = Product::latest()->paginate(5);
        $sum_product=count( Product::all());
        $param=[
            'products' =>$products,
            'sum_product' =>$sum_product
        ];
        return view('admin.products.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
    //    dd(Auth::user());
       if( $this->authorize('create', Product::class)){
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
       }else{
        abort(403);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, Product $product)
    {
        $this->authorize('create', Product::class);
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->amouth = $request->amouth;
            $product->use = $request->use;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->user_id = auth()->user()->id;

            if ($request->hasFile('file')) {
                $file = $request->file;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                // $product->image = $newFileName;// cột image gán bằng tên file mới
                $request->file('file')->storeAs('public/images', $newFileName); //lưu file vào mục public/images với tê mới là $newFileName
                $product->image = $newFileName;
            }


            $product->save();
            Session::flash('success', 'Thêm Sản phẩm thành công');
            return redirect()->route('product.index');
        } catch (Exception $e) {
            Session::flash('success', 'Thêm Sản phẩm  khong thành công');
            Log::error('error' . $e->getMessage() . 'line________' . $e->getLine());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function show(Product $product)
    {
        $this->authorize('view', Product::class);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function edit(Product $product)
    {
        $this->authorize('update', Product::class);
        $id = $product->id;

        $categories = Category::all();
        return view('admin.products.edit', compact('id', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', Product::class);
        try {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->amouth = $request->amouth;
            $product->use = $request->use;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->category_id = $request->category_id;

            if ($request->hasFile('file')) {
                $file = $request->file;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $request->file('file')->storeAs('public/images', $newFileName); //lưu file vào mục public/images với tê mới là $newFileName
                $product->image = $newFileName; // cột image gán bằng tên file mới
            }else{
                $product->image = $product->image;
            }
            $product->save();
            Session::flash('success', 'chỉnh sửa thành công');
            return redirect()->route('product.index');
        } catch (Exception $e) {
            Session::flash('error', 'chỉnh sửa  thất bại');
            Log::eror('error update' . $e->getMessage() . 'line________' . $e->getLine());
            return redirect()->back();
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
        $this->authorize('delete', Product::class);
        try {

            DB::beginTransaction();
            $product = Product::findOrFail($id);
            $product->delete();
            DB::commit();
            Session::flash('success', 'Xóa sản phẩm thành công');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('errors', 'Xóa danh mục vĩnh viễn lỗi!!! Hãy thử lại');
            Log::error('messages' . $e->getMessage() . 'line________' . $e->getLine());
            return redirect()->route('category.index');
        }
    }

    public function trashed()
    {
        $producs_trasheds = Product::onlyTrashed()->get();
        return view('admin.products.recycleBin', compact('producs_trasheds'));
    }

    public function restore($id)
    {
        $this->authorize('delete', Product::class);

        try {
            DB::beginTransaction();
            $category = Product::withTrashed()->where('id', $id)->restore();
            DB::commit();
            Session::flash('success', 'Phục hồi danh mục thành công');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error' . $e->getMessage() . '_____line' . $e->getLine());
            Session::flash('error', 'Phục hồi không thànnh công');
            return redirect()->route('product.index');
        }
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Product::class);

        try {
            DB::beginTransaction();
            $product = Product::withTrashed()->find($id);
            $product->forceDelete();
            DB::commit();
            Session::flash('success', 'Xóa danh mục vĩnh viễn thành công');
            return redirect()->route('product-trashed');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('errors', 'Xóa danh mục vĩnh viễn lỗi!!! Hãy thử lại');
            Log::error('messages' . $e->getMessage() . 'line________' . $e->getLine());
            return redirect()->route('product-trashed');
        }
    }
}
