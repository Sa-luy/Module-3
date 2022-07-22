<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use lang\en\messages;

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
        $product =  Product::find($id);
        return view('fronten.product_show', compact('product'));
    }

    public function showCategory(Category $category, $id)
    {
        $categories_id = Category::findOrFail($id);
        $category_products = $categories_id->products;
        return view('admin.categories.show', compact('category_products'));
        // return view('fronten.category_show',compact('category'));
    }
}
