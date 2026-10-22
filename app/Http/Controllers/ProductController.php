<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    // GET /api/products
public function index()
{
    $products = Product::latest()->paginate(10);

    return response()->json([
        'success' => true,
        'message' => 'Daftar data produk',
        'data'    => $products->items(),
        'meta'    => [
            'current_page' => $products->currentPage(),
            'last_page'    => $products->lastPage(),
            'per_page'     => $products->perPage(),
            'total'        => $products->total(),
        ],
    ], 200);
}
    // POST /api/products
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data'    => $product,
        ], 201);
    }

    // GET /api/products/{product}
    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail data produk',
            'data'    => $product,
        ], 200);
    }

    // PUT/PATCH /api/products/{product}
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data'    => $product,
        ], 200);
    }

    // DELETE /api/products/{product}
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus',
        ], 200);
    }
}