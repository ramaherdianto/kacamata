@extends('layouts.app',['title' => 'Customers'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i>Data Customer</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Tombol Tambah Customer -->
                            @can('customers.create')
                            <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> <span class="ms-2">Tambah Customer</span>
                            </a>
                            @endcan

                            <!-- Form Pencarian -->
                            <form action="{{ route('admin.customer.index') }}" method="GET" class="d-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari customer..." name="q">
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
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Kode Customer</th>
                                        <th scope="col">Informasi Mata</th>
                                        <th scope="col">Tanggal Beli</th>
                                        <th scope="col">Produk Yang Dibeli</th>
                                        <th scope="col">Jumlah Beli</th>
                                        <th scope="col">Nomor Telepon</th>
                                        <th scope="col" style="width: 30%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $no => $customer)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($customers->currentPage()-1) *
                                            $customers->perPage() }}</th>
                                        <td>{{ $customer->nama_customer }}</td>
                                        <td>{{ $customer->kode_customer }}</td>
                                        <td>{{ $customer->informasi_mata }}</td>
                                        <td>{{ $customer->tanggal_beli }}</td>
                                        <td>{{ $customer->produkMasuk->nama_produk_masuk }}</td>

                                        <td>{{ $customer->jumlah_beli }}</td>
                                        <td>{{ $customer->nomor_telepon_customer }}</td>
                                        <td class="text-center">
                                            @can('customers.edit')
                                            {{-- <a href="{{ route('admin.customer.edit', $customer->id) }}" type="button"
                                                class="btn btn-warning mx-2">
                                                Edit
                                            </a> --}}
                                            @endcan

                                            @can('customers.delete')
                                            <x-button-delete id="{{ $customer->id }}" title="Hapus Data"
                                                url="{{ route('admin.customer.destroy', $customer->id) }}" />
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $customers->links("vendor.pagination.bootstrap-5") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
