@extends('layouts.app',['title' => 'Produk'])

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Laporan Produk Keluar</h1>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk memilih rentang tanggal -->
                        <form action="{{ route('admin.report.index') }}" method="GET" class="mb-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="start_date" class="form-label">Dari Tanggal:</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="end_date" class="form-label">Sampai Tanggal:</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Report Data</button>
                                </div>
                            </div>
                        </form>

                        <!-- Tabel untuk menampilkan data -->
                        @if(isset($data) && count($data) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Total Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->nama_produk_masuk }}</td>
                                    <td>{{ $item->tanggal_beli }}</td>
                                    <td>{{ $item->total_beli }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.generate.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}"
                            class="btn btn-secondary">
                            <i class="fa fa-print"></i><span class="ms-2"> Cetak Laporan Keluar
                        </a>
                        @else
                        <p>Tidak ada data untuk ditampilkan.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
