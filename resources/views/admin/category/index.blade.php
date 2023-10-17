@extends('layouts.app',['title' => 'Kategori'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i>Data Kategori Produk</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Tombol Tambah Kategori -->
                            @can('kategoriproduks.create')
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> <span class="ms-2">Tambah Kategori</span> 
                            </a>
                            @endcan

                            <!-- Form Pencarian -->
                            <form action="{{ route('admin.category.index') }}" method="GET" class="d-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari kategori..." name="q">
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
                                        <th scope="col" style="width: 15%">NAMA KATEGORI</th>
                                        <th scope="col" style="text-align:center">IMAGE</th>
                                        <th scope="col" style="width: 30%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriproduks as $no => $kategoriproduk)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($kategoriproduks->currentPage()-1) *
                                            $kategoriproduks->perPage() }}</th>
                                        <td scope="row">{{
                                            $kategoriproduk->nama_kategori_produk }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/kategoriproduks/' . $kategoriproduk->gambar_kategori_produk) }}"
                                                style="width: 60px">
                                        </td>


                                        <td class="text-center">
                                            @can('kategoriproduks.edit')
                                            <a href="{{ route('admin.category.edit', $kategoriproduk->id) }}"
                                                type="button" class="btn btn-warning mx-2">
                                                Edit
                                            </a>

                                            @endcan

                                            @can('kategoriproduks.delete')
                                            <x-button-delete id="{{ $kategoriproduk->id }}" title="Hapus"
                                                url="{{ route('admin.category.destroy', $kategoriproduk->id) }}" />
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $kategoriproduks->links("vendor.pagination.bootstrap-5") }}
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
