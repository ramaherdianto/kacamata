@extends('layouts.app',['title' => 'Supplier'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i>Data Supplier</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Tombol Tambah Kategori -->
                            @can('suppliers.create')
                            <a href="{{ route('admin.supplier.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> <span class="ms-2">Tambah Supplier</span>
                            </a>
                            @endcan

                            <!-- Form Pencarian -->
                            <form action="{{ route('admin.supplier.index') }}" method="GET" class="d-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari supplier..." name="q">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th scope=" col" style="text-align: center;width: 6%">NO</th>
                                        <th scope="col" style="width: 15%">NAMA SUPPLIER</th>
                                        <th scope="col" style="text-align:center">NOMOR</th>
                                        <th scope="col" style="text-align:center">ALAMAT</th>
                                        <th scope="col" style="width: 30%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $no => $supplier)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($suppliers->currentPage()-1) *
                                            $suppliers->perPage() }}</th>
                                        <td scope="row">{{
                                            $supplier->nama_supplier }}</td>
                                        <td scope="row">{{
                                            $supplier->nomor_telepon_supplier }}</td>
                                        <td scope="row">{{
                                            $supplier->alamat_supplier }}</td>


                                        <td class="text-center">
                                            @can('suppliers.edit')
                                            <a href="{{ route('admin.supplier.edit', $supplier->id) }}" type="button"
                                                class="btn btn-warning mx-2">
                                                Edit
                                            </a>

                                            @endcan

                                            @can('suppliers.delete')
                                            <x-button-delete id="{{ $supplier->id }}" title="Hapus Data"
                                                url="{{ route('admin.supplier.destroy', $supplier->id) }}" />
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $suppliers->links("vendor.pagination.bootstrap-5") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


@stop
