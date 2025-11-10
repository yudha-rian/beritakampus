<?php
namespace App\Http\Controllers;
use App\Models\Product;
class ProductController extends Controller
{
public function index($filter = null)
{
if ($filter == 'elektronik') {
$products = Product::where('category', 'Elektronik')->paginate(5);
} elseif ($filter == 'furniture') {
$products = Product::where('category', 'Furniture')->paginate(5);
} elseif ($filter == 'fashion') {
$products = Product::where('category', 'Fashion')->paginate(5);
} elseif ($filter == 'termurah') {
$products = Product::orderBy('price', 'asc')->paginate(5);
} elseif ($filter == 'termahal') {
$products = Product::orderBy('price', 'desc')->paginate(5);
} elseif ($filter == 'stok-menipis') {
$products = Product::where('stock', '<', 10)->orderBy('stock', 'asc')->paginate(5);
} elseif ($filter == 'stok-melimpah') {
$products = Product::where('stock', '>', 20)->paginate(5);
} elseif ($filter == 'harga-rata-rata-atas') {
$avgPrice = Product::avg('price');
$products = Product::where('price', '>', $avgPrice)->paginate(5);
} else {
$products = Product::paginate(5);
}
$totalProducts = Product::count();
$avgPrice = Product::avg('price');
$maxPrice = Product::max('price');
return view('products.index', compact('products', 'filter',
'totalProducts', 'avgPrice', 'maxPrice'));
}

public function detail($id)
{
$product = Product::findOrFail($id);
return view('products.detail', compact('product'));
}
}
