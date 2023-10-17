<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->when(request()->q, function ($suppliers) {
            $suppliers = $suppliers->where('nama_supplier', 'like', '%' . request()->q . '%');
        })->paginate(5);

        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'nama_supplier' => 'required|unique:suppliers',
            'nomor_telepon_supplier' => 'required|unique:suppliers',
            'alamat_supplier' => 'required',
        ]);

        $supplier = Supplier::create([
            'nama_supplier' => $request->input('nama_supplier'),
            'nomor_telepon_supplier' => $request->input('nomor_telepon_supplier'),
            'alamat_supplier' => $request->input('alamat_supplier')
        ]);

        if ($supplier) {
            return redirect()->route('admin.supplier.index')->with(['toast_success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.supplier.index')->with(['toast_fail' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'nomor_telepon_supplier' => 'required',
            'alamat_supplier' => 'required',
        ]);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'nomor_telepon_supplier' => $request->nomor_telepon_supplier,
            'alamat_supplier' => $request->alamat_supplier,
        ]);

        return redirect()->route('admin.supplier.index')->with(['toast_success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {

        $supplier->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
