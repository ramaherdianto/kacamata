@extends('layouts.app',['title' => 'Edit Produk Masuk'])

@section('content')

<div class="container-xl mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Produk Masuk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.produk.update', $produkMasuk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                         <!-- Kode Produk Masuk -->
                         <div class="form-group">
                            <label for="kode_produk_masuk">Kode Produk</label>
                            <input type="text" id="kode_produk_masuk" name="kode_produk_masuk"
                                value="{{ $produkMasuk->kode_produk_masuk }}" class="mt-2 form-control" required>
                        </div>

                        
                        <!-- Nama Produk Masuk -->
                        <div class="form-group">
                            <label for="nama_produk_masuk">Nama Produk</label>
                            <input type="text" id="nama_produk_masuk" name="nama_produk_masuk"
                                value="{{ $produkMasuk->nama_produk_masuk }}" class="mt-2 form-control" required>
                        </div>


                        
                        <!-- Tanggal Produk Masuk -->
                        <div class="form-group my-3">
                            <label for="tanggal_produk_masuk">Tanggal Produk</label>
                            <input type="date" id="tanggal_produk_masuk" name="tanggal_produk_masuk"
                                value="{{ $produkMasuk->tanggal_produk_masuk }}" class="mt-2 form-control" required>
                        </div>


                        <!-- Gambar Produk Masuk (Opsional karena mungkin tidak ingin diubah) -->
                        <div class="form-group my-3">
                            <label for="gambar_produk_masuk">Gambar Produk (Opsional)</label>
                            <input type="file" id="gambar_produk_masuk" name="gambar_produk_masuk" class="mt-2 form-control">
                        </div>


                         <!-- Satuan -->
                         <div class="form-group my-3">
                            <label for="satuan">Satuan</label>
                            <input type="text" id="satuan" name="satuan" value="{{ $produkMasuk->satuan }}"
                                class="form-control" required>
                        </div>



                        <!-- Kuantitas Produk Masuk -->
                        <div class="form-group">
                            <label for="kuantitas_produk_masuk">Kuantitas Produk</label>
                            <input type="number" id="kuantitas_produk_masuk" name="kuantitas_produk_masuk"
                                value="{{ $produkMasuk->kuantitas_produk_masuk }}" class="mt-2 form-control" required>
                        </div>


                        <!-- Harga Produk Masuk -->
                        <div class="form-group my-3">
                            <label for="harga_produk_masuk">Harga Produk</label>
                            <input type="number" id="harga_produk_masuk" name="harga_produk_masuk"
                                value="{{ $produkMasuk->harga_produk_masuk }}" class="mt-2 form-control" required>
                        </div>


                        <!-- Harga Grosir Produk Masuk -->
                        <div class="form-group">
                            <label for="harga_grosir_produk_masuk">Harga Grosir Produk</label>
                            <input type="number" id="harga_grosir_produk_masuk" name="harga_grosir_produk_masuk"
                                value="{{ $produkMasuk->harga_grosir_produk_masuk }}" class="mt-2 form-control" required>
                        </div>

                       
                        <!-- Kategori Produk -->
                        <div class="form-group my-3">
                            <label for="kategori_produk_id">Kategori Produk</label>
                            <select id="kategori_produk_id" name="kategori_produk_id" class="mt-2 form-control" required>
                                @foreach($kategoriproduks as $kategori)
                                <option value="{{ $kategori->id }}" {{ $produkMasuk->kategori_produk_id == $kategori->id
                                    ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori_produk }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Supplier -->
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select id="supplier_id" name="supplier_id" class="mt-2 form-control" required>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $produkMasuk->supplier_id == $supplier->id ?
                                    'selected' : '' }}>
                                    {{ $supplier->nama_supplier }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        

                        <!-- Deskripsi Produk Masuk -->
                        {{-- <div class="form-group">
                            <label for="deskripsi_produk_masuk">Deskripsi Produk Masuk</label>
                            <textarea id="deskripsi_produk_masuk" name="deskripsi_produk_masuk" rows="4"
                                class="form-control">{{ $produkMasuk->deskripsi_produk_masuk }}</textarea>
                        </div> --}}


                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Ubah
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
