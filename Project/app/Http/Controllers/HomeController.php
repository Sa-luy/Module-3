<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
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
            $id_category=$product->category->id;
            $categoryitems=Category::findOrFail($id_category)->products;
            $categoryitems= $categoryitems->paginate(5);
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
    function search(Request $request)
    {
        // dd($request->all());
        $search_products=Product::where('name', 'LIKE', '%' . $request->name . '%');
        $param= [
            'search_products' => $search_products
        ];
        return view('fronten.custom.search',$param);
    }
}
