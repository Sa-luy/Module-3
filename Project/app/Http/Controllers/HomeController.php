<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use lang\en\messages;
use PhpParser\Node\Expr;

use function PHPSTORM_META\argumentsSet;

class HomeController extends Controller
{
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function home()
    {
        $products = $this->product->paginate(5);
        $categories = $this->category->paginate(5);
        // $product_hot= $this->product->latest()->first();
        $param = [
            'products' => $products,
            'categories' => $categories,
            // 'product_hot' => $product_hot  
        ];
        return view('fronten.homepage', $param);
    }

    public function showProduct(Product $product, $id)
    {
        try {
            $product =  Product::find($id);
            $id_category = $product->category->id;
            $categoryitems = Category::findOrFail($id_category)->products()->paginate(5);
            // $categoryitems= $categoryitems->paginate(5);
            $param = [
                'product' => $product,
                'categoryitems' => $categoryitems

            ];
            // dd($categoryitems);
            return view('fronten.custom.product_show', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(404);
        }
    }

    public function showCategory(Category $category, $id)
    {
        try {
            $categories_id = Category::findOrFail($id);
            $category_products = Product::where('category_id', $id)->paginate(8);
            $param = [
                'category_products' => $category_products,
                'categories_id' => $categories_id
            ];
            return view('fronten.custom.show_category', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(404);
        }
    }
    function getProfile()
    {
        $customer_curent=Auth::guard('customer')->user();
        // dd();
        $param = [
            'customer_curent'=> $customer_curent
        ];
        return view('fronten.custom.customer_profile', $param);
    }
    function editProfile(Request $request,Customer $customer)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request->file('avatar'));
        try {
            $id= Auth::guard('customer')->user()->id;
        $customer_curent=Customer::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $request->file('avatar')->storeAs('public/images/user', $newFileName); //lưu file vào mục public/images với tê mới là $newFileName
            $customer_curent->avatar = $newFileName; // cột image gán bằng tên file mới
        }else{
            $customer_curent->avatar = $customer_curent->avatar;
        }
        $customer_curent->save();
        return redirect()->back();
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            return redirect()->back();
        }
        
        
    }

    function search(Request $request)
    {
        $search_products=Product::where('name', 'LIKE', '%' . $request->name . '%')->get();
        $param= [
            'search_products' => $search_products
        ];
        return view('fronten.custom.search',$param);
    }
 
  
    
    public function getProductSearch(Request $request)
    {
        $product = [];

        // $product = Product::query();


        if ($request->name !== null ) {
           $product =  Product::where('name', 'LIKE', '%' . $request->name . '%');
           $product_name =  $product->get();
        $products[] = $product_name;
        }

        if ($request->status !== null) {
           $product =  Product::where('status', 'LIKE', '%' . $request->status . '%');

           $product =  Product::where('status', $request->status);
           $product_status =  $product->get();
           $products[] = $product_status;
        }
        if ($request->description !== null) {
           $product =  Product::where('description', 'LIKE', '%' . $request->description . '%');
           $product =  Product::where('description', $request->description);
           $product_description =  $product->get();
           
           $products[] = $product_description;
        }

        if ($request->price !== null) {
           $product =  Product::where('price','<=', $request->price);
           $product_price =  $product->get();
           $products[] = $product_price;
        }
        // dd($products);
        // $products =  $product->get();
        $param= [
            'search_products' => $products
        ];
       
        return view('fronten.custom.search_advance', $param);
    }
}
