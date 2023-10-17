<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriproduk;
use App\Models\Produkmasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDF;

class ProdukController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:produks.index|produks.create|produks.edit|produks.delete']);
    }

    public function index()
    {
        $produkMasuks = ProdukMasuk::with(['kategoriproduk', 'supplier'])
            ->latest()
            ->when(request()->q, function ($produkMasuks) {
                $produkMasuks = $produkMasuks->where('nama_produk_masuk', 'like', '%' . request()->q . '%');
            })
            ->paginate(5);

        return view('admin.produk.index', compact('produkMasuks'));
    }



    public function create()
    {
        $kategoriproduks = Kategoriproduk::all();
        $suppliers = Supplier::all();
        return view('admin.produk.create', compact('kategoriproduks', 'suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk_masuk' => 'required|string|max:255',
            'tanggal_produk_masuk' => 'required|date',
            'kuantitas_produk_masuk' => 'required|integer',
            'gambar_produk_masuk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_produk_masuk' => 'required|numeric',
            'harga_grosir_produk_masuk' => 'required|numeric',
            'satuan' => 'required|string',
            'kode_produk_masuk' => 'required|string',
            'kategori_produk_id' => 'required|exists:kategoriproduks,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        if ($request->hasFile('gambar_produk_masuk')) {
            $data['gambar_produk_masuk'] = $request->file('gambar_produk_masuk')->store('produk_masuk', 'public');
        }

        ProdukMasuk::create($data);

        return redirect()->route('admin.produk.index')->with('toast_success', 'Data Berhasil Disimpan');
    }


    public function edit($id)
    {
        $kategoriproduks = Kategoriproduk::all();
        $suppliers = Supplier::all();
        $produkMasuk = ProdukMasuk::findOrFail($id);
        return view('admin.produk.edit', compact('kategoriproduks', 'suppliers', 'produkMasuk'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_produk_masuk' => 'required|string|max:255',
            'tanggal_produk_masuk' => 'required|date',
            'kuantitas_produk_masuk' => 'required|integer',
            'gambar_produk_masuk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_produk_masuk' => 'required|numeric',
            'harga_grosir_produk_masuk' => 'required|numeric',
            'satuan' => 'required|string',
            'kode_produk_masuk' => 'required|string',
            'kategori_produk_id' => 'required|exists:kategoriproduks,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $produkMasuk = ProdukMasuk::findOrFail($id);

        if ($request->hasFile('gambar_produk_masuk')) {
            Storage::delete('public/' . $produkMasuk->gambar_produk_masuk);
            $data['gambar_produk_masuk'] = $request->file('gambar_produk_masuk')->store('produk_masuk', 'public');
        }

        $produkMasuk->update($data);

        return redirect()->route('admin.produk.index')->with('toast_success', 'Data Berhasil Diubah');
    }




    public function destroy(Produkmasuk $produk)
    {

        $produk->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function generatePDF()
    {
        $data = DB::table('produkmasuks')->select('nama_produk_masuk', 'tanggal_produk_masuk', 'kuantitas_produk_masuk')->get();

        $pdf = PDF::loadView('admin.produk.pdf_view', ['data' => $data]);
        return $pdf->download('laporan_produk_masuk.pdf');
    }
}
