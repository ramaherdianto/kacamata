<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Produkmasuk;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->when(request()->q, function ($customers) {
            $customers = $customers->where('nama_customer', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        $produkMasuks = Produkmasuk::all();
        return view('admin.customers.create', compact('produkMasuks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'informasi_mata' => 'required',
            'nama_customer' => 'required',
            'tanggal_beli' => 'required',
            'produkmasuk_id' => 'required',
            'jumlah_beli' => 'required',
            'nomor_telepon_customer' => 'required',
        ]);

        $produkMasuk = ProdukMasuk::findOrFail($request->produkmasuk_id);
        if ($request->jumlah_beli > $produkMasuk->kuantitas_produk_masuk) {
            return redirect()->back()->with(['toast_fail' => 'Jumlah beli melebihi kuantitas produk masuk!']);
        }
        Customer::create($request->all());

        $produkMasuk->kuantitas_produk_masuk -= $request->jumlah_beli;
        $produkMasuk->save();

        return redirect()->route('admin.customer.index')->with(['toast_success' => 'Data Berhasil Disimpan']);
    }


    public function edit($id)
    {
        $produkMasuks = ProdukMasuk::all();
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('produkMasuks', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'informasi_mata' => 'required',
            'nama_customer' => 'required',
            'tanggal_beli' => 'required',
            'produkmasuk_id' => 'required',
            'jumlah_beli' => 'required',
            'nomor_telepon_customer' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $produkMasuk = ProdukMasuk::findOrFail($request->produkmasuk_id);

        if ($request->jumlah_beli > $produkMasuk->kuantitas_produk_masuk) {
            return redirect()->back()->with(['toast_fail' => 'Jumlah beli melebihi kuantitas produk masuk!']);
        }

        $customer->update($request->all());

        $produkMasuk->kuantitas_produk_masuk -= $request->jumlah_beli;
        $produkMasuk->save();

        return redirect()->route('admin.customer.index')->with(['toast_success' => 'Data Berhasil Diupdate!']);
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customer.index');
    }
}
