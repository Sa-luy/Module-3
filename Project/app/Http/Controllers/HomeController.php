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
        return view('fronten.homepage', compact('products', 'categories'));
    }

    public function showProduct(Product $product, $id)
    {
        try {
            $product =  Product::find($id);
        $param = [
            'product' => $product
        ];
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
             $category_products = Product::where('category_id',$id)->paginate(8);
        $param=[
            'category_products' => $category_products,
            'categories_id' =>$categories_id
        ];
        return view('fronten.custom.show_category',$param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(404);
        }
       
    }
}
