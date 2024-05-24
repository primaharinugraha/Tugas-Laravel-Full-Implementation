<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

public function productDetail($id)
{
    $product = Product::findOrFail($id);
    $transaction = Transaction::where('product_id', $id)->first(); // Menemukan transaksi terkait dengan produk
    return view('product.detailproduk', compact('product', 'transaction'));
}

}