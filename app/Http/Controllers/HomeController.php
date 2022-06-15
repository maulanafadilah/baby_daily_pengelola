<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $product_count = Product::select('products.id')->join('sellers', 'products.id_penjual', '=', 'sellers.id')->where('sellers.tag', '2')->count();
        $seller_count = Seller::select('id')->where('tag', '2')->count();
        $category_count = Categorie::select('id')->count();
        // return $product_count;
        return view('dashboard', compact('product_count', 'seller_count', 'category_count'));
    }
    

    
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categorie::class, 'slug', $request->nama_kategori);
        return response()->json(['slug' => $slug]);
    }
}
