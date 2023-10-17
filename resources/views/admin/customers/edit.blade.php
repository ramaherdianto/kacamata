@extends('layouts.app',['title' => 'Edit Customer'])

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-12">
                <h2 class="text-center">Customer Management</h2>
            </div>
        </div>
    </div>
</div>

<div class="container-xl mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Customer</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Existing data populated here -->

                        <div class="form-group">
                            <label for="nama_customer">Nama Customer</label>
                            <input type="text" id="nama_customer" name="nama_customer"
                                value="{{ $customer->nama_customer }}" class="mt-2 form-control">
                        </div>

                        <div class="form-group my-3">
                            <label for="kode_customer">Kode Customer</label>
                            <input type="text" id="kode_customer" name="kode_customer"
                                value="{{ $customer->kode_customer }}" class="mt-2 form-control">
                        </div>

                        <div class="form-group">
                            <label for="informasi_mata">Informasi Mata</label>
                            <input type="text" id="informasi_mata" name="informasi_mata"
                                value="{{ $customer->informasi_mata }}" class="mt-2 form-control">
                        </div>

                        

                        <div class="form-group my-3">
                            <label for="tanggal_beli">Tanggal Beli</label>
                            <input type="date" id="tanggal_beli" name="tanggal_beli"
                                value="{{ $customer->tanggal_beli }}" class="mt-2 form-control">
                        </div>


                        <div class="form-group">
                            <label for="produkmasuk_id">Produk Yang Dibeli</label>
                            <select id="produkmasuk_id" name="produkmasuk_id" class="mt-2 form-control">
                                @foreach($produkMasuks as $produkMasuk)
                                <option value="{{ $produkMasuk->id }}" {{ $customer->produkmasuk_id == $produkMasuk->id
                                    ? 'selected' : '' }}>
                                    {{ $produkMasuk->nama_produk_masuk }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-3">
                            <label for="jumlah_beli">Jumlah Beli</label>
                            <input type="text" id="jumlah_beli" name="jumlah_beli" value="{{ $customer->jumlah_beli }}"
                                class="mt-2 form-control">
                        </div>

                        <div class="form-group">
                            <label for="nomor_telepon_customer">Nomor Telepon Customer</label>
                            <input type="number" id="nomor_telepon_customer" name="nomor_telepon_customer"
                                value="{{ $customer->nomor_telepon_customer }}" class="mt-2 form-control">
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Ubah
                            </button>
                            <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">
                                <i></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
