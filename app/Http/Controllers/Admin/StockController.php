<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produkmasuk;

class StockController extends Controller
{

    public function index()
    {
        $products = ProdukMasuk::with(['supplier', 'kategoriproduk'])
            ->latest()
            ->when(request()->q, function ($query) {
                return $query->where('nama_produk_masuk', 'like', '%' . request()->q . '%');
            })
            ->paginate(5);

        return view('admin.stock.index', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $product = ProdukMasuk::findOrFail($id);

        $product->update([
            'kuantitas_produk_masuk' => $request->kuantitas_produk_masuk,
        ]);

        return back()->with('toast_success', 'Data berhasil diperbarui');
    }
}
