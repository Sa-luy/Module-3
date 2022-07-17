<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        try {
            DB::beginTransaction();
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            Session::flash('success', 'Thêm danh mục thành công');

            return redirect()->route("category.index");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //      $products= Product::all();

        // $categories_id = Category::findOrFail($id);
        // $category_products=$categories_id->products;
        // return view('admin.categories.show', compact('category_products','products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        try {
            DB::beginTransaction();
            $id = $category->id;
            return view('admin.categories.edit', compact('id', 'category'));
            //code...
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category->name = $request->name;
            $category->save();
            Db::commit();
            Session::flash('success', 'Chỉnh Sửa danh mục thành công');
            return redirect()->route('category.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '--->Line' . $e->getLine());
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            Session::flash('success', 'Xóa danh mục thành công');
            return redirect()->route('category.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Try again' . $e->getMessage() . '_____>line' . $e->getLine());
            Session::flash('success', 'Xóa danh mục Lỗi!!! Hãy thử lại');

            return redirect()->route('category.index');
        }
    }
    public function trashed()
    {
        $categories_trashed = Category::onlyTrashed()->get();
        return view('admin.categories.recycleBin', compact('categories_trashed'));
    }

    public function restore($id)
    {
        try {
            DB::beginTransaction();
            $category = Category::withTrashed()->where('id', $id)->restore();
            DB::commit();
        Session::flash('success', 'Phục hồi danh mục thành công');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error' . $e->getMessage() . '_____line' . $e->getLine());
            Session::flash('error', 'Phục hồi không thànnh công');
            return redirect()->route('category.index');
        }
    }
    public function forceDelete($id)
    {
        try {
            DB::beginTransaction();
            $category= Category::withTrashed()->find($id);
            $product_categories=$category->products;
            foreach ($product_categories as $key => $product_category) {
            $product_category->category_id= null;
            $product_category->save();
            // dd($product_category);
            }
            $category->forceDelete();
        DB::commit();
        Session::flash('success', 'Xóa danh mục vĩnh viễn thành công');
        return redirect()->route('category-trashed');
        } catch (\Exception $e) {
            DB::rollBack();
        Session::flash('errors', 'Xóa danh mục vĩnh viễn lỗi!!! Hãy thử lại');
        Log::error('messages' . $e->getMessage() . 'line________'.$e->getLine());
        return redirect()->route('category-trashed');


            
        }
        
        
    }
}
