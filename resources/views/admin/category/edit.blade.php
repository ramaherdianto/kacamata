@extends('layouts.app',['title' => ' Edit'])

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
                    <h4 class="mb-0">Edit Kategori Produk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $kategoriproduk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" id="nama_kategori_produk" name="nama_kategori_produk"
                                value="{{ $kategoriproduk->nama_kategori_produk }}" placeholder="Masukkan Nama Kategori"
                                class="mt-2 form-control @error('nama_kategori_produk') is-invalid @enderror" required>
                            @error('nama_kategori_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar Kategori</label>
                            <input type="file" name="gambar_kategori_produk"
                                class="mt-2 form-control @error('gambar_kategori_produk') is-invalid @enderror" required>
                            <img src="{{ asset('storage/kategoriproduks/' . $kategoriproduk->gambar_kategori_produk) }}"
                                alt="Gambar Kategori" style="width: 100px; margin-top: 10px;">
                            @error('gambar_kategori_produk')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Ubah
                            </button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
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
