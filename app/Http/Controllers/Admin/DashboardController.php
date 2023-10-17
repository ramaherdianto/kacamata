<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriproduk;
use App\Models\Produkmasuk;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Kategoriproduk::count();
        $suppliers = Supplier::count();
        $produkMasuk = ProdukMasuk::count();
        $user = User::count();
        $produkKurangDariSepuluh = ProdukMasuk::where('kuantitas_produk_masuk', '<', 10)->get();

        $produkPopuler = DB::table('customers')
            ->select('produkmasuk_id', DB::raw('count(*) as total'))
            ->groupBy('produkmasuk_id')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

        $idProdukMasuk = $produkPopuler->pluck('produkmasuk_id');
        $jumlahBeli = $produkPopuler->pluck('total');

        $namaProdukMasuk = DB::table('produkmasuks')
            ->whereIn('id', $idProdukMasuk)
            ->pluck('nama_produk_masuk');
        return view('admin.dashboard.index', compact('categories', 'suppliers', 'produkMasuk', 'user', 'produkKurangDariSepuluh', 'idProdukMasuk', 'jumlahBeli', 'namaProdukMasuk'));
    }
}
