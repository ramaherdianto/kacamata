@extends('layouts.app',['title' => 'Create'])

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
                    <h4 class="mb-0">Tambah Supplier</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.supplier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Supplier</label>
                            <input type="text" id="nama_supplier" name="nama_supplier"
                                value="{{ old('nama_supplier') }}" placeholder="Masukkan Nama Supplier"
                                class="mt-2 form-control @error('nama_supplier') is-invalid @enderror" required>
                            @error('nama_supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="name">Nomor Telepon Supplier</label>
                            <input type="number" id="nomor_telepon_supplier" name="nomor_telepon_supplier"
                                value="{{ old('nomor_telepon_supplier') }}" placeholder="Masukkan Nomor Supplier"
                                class="mt-2 form-control @error('nomor_telepon_supplier') is-invalid @enderror" required>
                            @error('nomor_telepon_supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Alamat Supplier</label>
                            <input type="text" id="alamat_supplier" name="alamat_supplier"
                                value="{{ old('alamat_supplier') }}" placeholder="Masukkan Nama Kategori"
                                class="mt-2 form-control @error('alamat_supplier') is-invalid @enderror" required>
                            @error('alamat_supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Simpan
                            </button>
                            <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">
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
