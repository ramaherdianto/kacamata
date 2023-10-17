@extends('layouts.app',['title' => 'Create Customer'])

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-12">
                <h2 class="text-center"></h2>
            </div>
        </div>
    </div>
</div>

<div class="container-xl mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Customer</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customer.store') }}" method="POST">
                        @csrf

                            <!-- Nama Customer -->
                            <div class="form-group">
                                <label for="nama_customer">Nama Customer</label>
                                <input type="text" id="nama_customer" name="nama_customer"
                                    value="{{ old('nama_customer') }}" placeholder="Masukkan Nama Customer"
                                    class="mt-2 form-control @error('nama_customer') is-invalid @enderror" required>
                                @error('nama_customer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
    

                                <!-- Kode Customer -->
                        <div class="form-group my-3">
                            <label for="kode_customer">Kode Customer</label>
                            <input type="text" id="nama_customer" name="kode_customer"
                                value="{{ old('kode_customer') }}" placeholder="Masukkan Kode Customer"
                                class="mt-2 form-control @error('kode_customer') is-invalid @enderror" required>
                            @error('kode_customer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <!-- Informasi Mata -->
                        <div class="form-group">
                            <label for="informasi_mata">Informasi Mata</label>
                            <input type="text" id="informasi_mata" name="informasi_mata"
                                value="{{ old('informasi_mata') }}" placeholder="Masukkan Informasi Mata"
                                class="form-control @error('informasi_mata') is-invalid @enderror" required>
                            @error('informasi_mata')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    
                        <!-- Tanggal Beli -->
                        <div class="form-group my-3">
                            <label for="tanggal_beli">Tanggal Beli</label>
                            <input type="date" id="tanggal_beli" name="tanggal_beli" value="{{ old('tanggal_beli') }}"
                                class="mt-2 form-control @error('tanggal_beli') is-invalid @enderror" required>
                            @error('tanggal_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                         <!-- Jumlah Beli -->
                         <div class="form-group">
                            <label for="jumlah_beli">Jumlah Beli</label>
                            <input type="text" id="jumlah_beli" name="jumlah_beli" value="{{ old('jumlah_beli') }}"
                                placeholder="Masukkan Jumlah Beli"
                                class="mt-2 form-control @error('jumlah_beli') is-invalid @enderror" required>
                            @error('jumlah_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <!-- Produk Yang Dibeli -->
                        <div class="form-group my-3">
                            <label for="produkmasuk_id">Produk Yang Dibeli</label>
                            <select id="produkmasuk_id" name="produkmasuk_id"
                                class="mt-2 form-control @error('produkmasuk_id') is-invalid @enderror" required>
                                @foreach($produkMasuks as $produkMasuk)
                                <option value="{{ $produkMasuk->id }}">{{ $produkMasuk->nama_produk_masuk }}</option>
                                @endforeach
                            </select>
                            @error('produkmasuk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <!-- Nomor Telepon Customer -->
                        <div class="form-group">
                            <label for="nomor_telepon_customer">Nomor Telepon Customer</label>
                            <input type="number" id="nomor_telepon_customer" name="nomor_telepon_customer"
                                value="{{ old('nomor_telepon_customer') }}"
                                placeholder="Masukkan Nomor Telepon Customer"
                                class="mt-2 form-control @error('nomor_telepon_customer') is-invalid @enderror" required>
                            @error('nomor_telepon_customer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Simpan
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
