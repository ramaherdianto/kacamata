@extends('layouts.app',['title' => 'Stock'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i>Data Stok Produk</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center mb-4">

                            <!-- Form Pencarian -->
                            <form action="{{ route('admin.stock.index') }}" method="GET" class="d-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari stok..." name="q">
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
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $i => $product)
                                    <tr>
                                        <td>{{ $i + $products->firstItem() }}</td>
                                        <td>{{ $product->kode_produk_masuk }}</td>
                                        <td>{{ $product->nama_produk_masuk }}</td>
                                        <td>{{ $product->satuan }}</td>
                                        <td class="text-blue">
                                            {{ $product->kuantitas_produk_masuk }}
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $product->id }}">
                                                Ubah stock
                                            </button>

                                            <div class="modal" id="{{ $product->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-sm modal-dialog-centered"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('admin.stock.update', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Stok</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Jumlah Stok</label>
                                                                    <input class="form-control"
                                                                        name="kuantitas_produk_masuk" type="number"
                                                                        placeholder=""
                                                                        value="{{ $product->kuantitas_produk_masuk }}" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-link link-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Batal
                                                                </a>
                                                                <button type="submit" class="btn btn-primary ms-auto">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>




                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div style="text-align: center">
                                {{ $products->links("vendor.pagination.bootstrap-5") }}
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
