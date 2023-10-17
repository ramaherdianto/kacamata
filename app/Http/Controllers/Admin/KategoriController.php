<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriproduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:kategoriproduks.index|kategoriproduks.create|kategoriproduks.edit|kategoriproduks.delete']);
    }

    public function index()
    {
        $kategoriproduks = Kategoriproduk::latest()->when(request()->q, function ($kategoriproduks) {
            $kategoriproduks = $kategoriproduks->where('nama_kategori_produk', 'like', '%' . request()->q . '%');
        })->paginate(5);

        return view('admin.category.index', compact('kategoriproduks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori_produk' => 'required|unique:kategoriproduks'
        ]);

        $image = $request->file('gambar_kategori_produk');
        $image->storeAs('public/kategoriproduks', $image->hashName());



        $kategoriproduk = Kategoriproduk::create([
            'gambar_kategori_produk'       => $image->hashName(),
            'nama_kategori_produk'     => $request->input('nama_kategori_produk')
        ]);

        if ($kategoriproduk) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.category.index')->with(['toast_success' => 'Data Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.category.index')->with(['toast_fail' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoriproduk $kategoriproduk)
    {
        return view('admin.category.edit', compact('kategoriproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategoriproduk $kategoriproduk)
    {
        $this->validate($request, [
            'nama_kategori_produk' => 'required|unique:kategoriproduks,nama_kategori_produk,' . $kategoriproduk->id
        ]);

        if ($request->file('gambar_kategori_produk') == "") {
            $kategoriproduk->update([
                'nama_kategori_produk' => $request->input('nama_kategori_produk'),
            ]);
        } else {
            Storage::disk('local')->delete('public/kategoriproduks/' . $kategoriproduk->gambar_kategori_produk);

            $image = $request->file('gambar_kategori_produk');
            $image->storeAs('public/kategoriproduks', $image->hashName());

            $kategoriproduk->update([
                'gambar_kategori_produk' => $image->hashName(),
                'nama_kategori_produk' => $request->input('nama_kategori_produk'),
            ]);
        }

        if ($kategoriproduk) {
            return redirect()->route('admin.category.index')->with(['toast_success' => 'Data Berhasil Diubah']);
        } else {
            return redirect()->route('admin.category.index')->with(['toast_fail' => 'Data Gagal Diupdate!']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoriproduk $kategoriproduk)
    {

        $kategoriproduk->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
