@extends('layouts.app', ['title' => 'Tambah Produk Masuk'])

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
                        <h4 class="mb-0">Tambah Produk Masuk</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <!-- Kode Produk-->
                            <div class="form-group">
                                <label for="kode_produk_masuk">Kode Produk </label>
                                <input type="text" id="kode_produk_masuk" name="kode_produk_masuk"
                                    value="{{ old('kode_produk_masuk') }}" placeholder="Masukkan Kode Produk Masuk"
                                    class="mt-2 form-control @error('kode_produk_masuk') is-invalid @enderror" required>
                                @error('kode_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Nama Produk Masuk -->
                            <div class="form-group mt-3">
                                <label for="nama_produk_masuk">Nama Produk </label>
                                <input type="text" id="nama_produk_masuk" name="nama_produk_masuk"
                                    value="{{ old('nama_produk_masuk') }}" placeholder="Masukkan Nama Produk Masuk"
                                    class="mt-2 form-control @error('nama_produk_masuk') is-invalid @enderror" required>
                                @error('nama_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Tanggal Produk Masuk -->
                            <div class="form-group my-3">
                                <label for="tanggal_produk_masuk">Tanggal Masuk </label>
                                <input type="date" id="tanggal_produk_masuk" name="tanggal_produk_masuk"
                                    value="{{ old('tanggal_produk_masuk') }}"
                                    class="mt-2 form-control @error('tanggal_produk_masuk') is-invalid @enderror" required>
                                @error('tanggal_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Gambar Produk-->
                            <div class="form-group my-3">
                                <label for="gambar_produk_masuk">Gambar Produk </label>
                                <input type="file" id="gambar_produk_masuk" name="gambar_produk_masuk"
                                    class="mt-2 form-control @error('gambar_produk_masuk') is-invalid @enderror" required>
                                @error('gambar_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Satuan -->
                            <div class="form-group my-3">
                                <label for="satuan">Satuan</label>
                                <input onkeypress="return event.charCode >= 65 && event.charCode <= 122" type= "text"
                                    pattern="[A-Za-z]+" title="Hanya huruf yang diperbolehkan" id="satuan" name="satuan"
                                    value="{{ old('satuan') }}" placeholder="Masukkan Satuan"
                                    class="mt-2 form-control @error('satuan')
is-invalid
@enderror" required>
                                @error('satuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Kuantitas Produk Masuk -->
                            <div class="form-group">
                                <label for="kuantitas_produk_masuk">Kuantitas Produk </label>
                                <input type="number" id="kuantitas_produk_masuk" name="kuantitas_produk_masuk"
                                    value="{{ old('kuantitas_produk_masuk') }}"
                                    placeholder="Masukkan Kuantitas Produk Masuk"
                                    class="mt-2 form-control @error('kuantitas_produk_masuk') is-invalid @enderror"
                                    required>
                                @error('kuantitas_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Harga Produk Masuk -->
                            <div class="form-group my-3">
                                <label for="harga_produk_masuk">Harga Produk </label>
                                <input type="number" id="harga_produk_masuk" name="harga_produk_masuk"
                                    value="{{ old('harga_produk_masuk') }}" placeholder="Masukkan Harga Produk Masuk"
                                    class="mt-2 form-control @error('harga_produk_masuk') is-invalid @enderror" required>
                                @error('harga_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Harga Grosir Produk Masuk -->
                            <div class="form-group">
                                <label for="harga_grosir_produk_masuk">Harga Grosir Produk</label>
                                <input type="number" id="harga_grosir_produk_masuk" name="harga_grosir_produk_masuk"
                                    value="{{ old('harga_grosir_produk_masuk') }}"
                                    placeholder="Masukkan Harga Grosir Produk Masuk"
                                    class="mt-2 form-control @error('harga_grosir_produk_masuk') is-invalid @enderror"
                                    required>
                                @error('harga_grosir_produk_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!--Kategori Produk-->
                            <div class="form-group my-3">
                                <label for="kategori_produk_id">Kategori Produk</label>
                                <select id="kategori_produk_id" name="kategori_produk_id"
                                    class="mt-2 form-control @error('kategori_produk_id') is-invalid @enderror" required>
                                    @foreach ($kategoriproduks as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori_produk }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_produk_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Supplier-->
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select id="supplier_id" name="supplier_id"
                                    class="mt-2 form-control @error('supplier_id') is-invalid @enderror" required>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Deskripsi Produk Masuk -->
                            {{-- <div class="form-group">
                            <label for="deskripsi_produk_masuk">Deskripsi Produk Masuk</label>
                            <textarea id="deskripsi_produk_masuk" name="deskripsi_produk_masuk" rows="4"
                                placeholder="Masukkan Deskripsi Produk Masuk"
                                class="form-control @error('deskripsi_produk_masuk') is-invalid @enderror">{{ old('deskripsi_produk_masuk') }}</textarea>
                            @error('deskripsi_produk_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}



                            <div class="form-group mt-4">
                                <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                    <i></i> Simpan
                                </button>
                                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
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
