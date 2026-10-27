<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

public function show($id) {
    $product = "Produk #" . $id;
    return view('products.show', compact('product'));
}
}