@extends('layouts.app',['title' => 'Produk'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i>Data Produk Masuk</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between  mb-4">
                            @can('produks.create')
                            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary mx-3">
                                <i class="fa fa-plus"></i> <span class="ms-2">Tambah Produk</span>
                            </a>
                            <a href="{{ route('admin.generate.produkpdf') }}" class="btn btn-secondary  ml-5">
                                <i class="fa fa-print"></i><span class="ms-2"> Cetak Laporan Masuk
                            </a>
                            @endcan
                        </div>
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <form action="{{ route('admin.produk.index') }}" method="GET" class="d-inline">
                                <div class="input-group d-flex justify-content-end">
                                    <input type="text" class="form-control" placeholder="Cari produk..." name="q">
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
                                        <th scope="col" style="text-align: center;width: 6%">NO</th>
                                        <th scope="col" style="width: 15%">KODE PRODUK</th>
                                        <th scope="col">NAMA PRODUK</th>
                                        <th scope="col">TANGGAL MASUK</th>
                                        <th scope="col">GAMBAR</th>
                                        <th scope="col">KUANTITAS</th>
                                        <th scope="col">KATEGORI PRODUK</th>
                                        <th scope="col" style="text-align:center">SUPPLIER</th>
                                        <th scope="col" style="width: 25%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produkMasuks as $no => $produkMasuk)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($produkMasuks->currentPage()-1) * $produkMasuks->perPage() }}</th>
                                        <td>{{ $produkMasuk->kode_produk_masuk }}</td>    
                                        <td>{{ $produkMasuk->nama_produk_masuk }}</td>
                                        <td>{{ $produkMasuk->tanggal_produk_masuk }}</td>

                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $produkMasuk->gambar_produk_masuk) }}"
                                                style="width: 60px">
                                        </td>
                                        <td>{{ $produkMasuk->kuantitas_produk_masuk }}</td>
                                        <td>{{ $produkMasuk->kategoriproduk->nama_kategori_produk ?? 'Tidak Ada
                                            Kategori' }}
                                        </td>
                                        <td>{{ $produkMasuk->supplier->nama_supplier ?? 'Tidak Ada Supplier' }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('admin.produk.edit', $produkMasuk->id) }}" type="button"
                                                class="btn btn-warning mx-2" style="display: inline-block;">
                                                Edit
                                            </a>

                                            @can('produks.delete')
                                            <x-button-delete id="{{ $produkMasuk->id }}" title="Hapus Data"
                                                url="{{ route('admin.produk.destroy', $produkMasuk->id) }}" />
                                            @endcan
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $produkMasuks->links("vendor.pagination.bootstrap-5") }}
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
