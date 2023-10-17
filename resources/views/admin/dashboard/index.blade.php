@extends('layouts.app',['title' => 'Dashboard'])

@section('content')




<div class="page-header d-print-none">
    <div class="toast" id="loginSuccessToast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto">Dashboard</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            Berhasil login!
        </div>
    </div>
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <img src="{{ asset('dist/banner3.PNG') }}" alt="" width="50px"
                style="border-radius:14px;margin-bottom:20px">
            <div class="col-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-category" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4h6v6h-6z"></path>
                                        <path d="M14 4h6v6h-6z"></path>
                                        <path d="M4 14h6v6h-6z"></path>
                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Kategori
                                </div>
                                <div class="text-muted">
                                    {{ $categories }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                        <path d="M3 9l4 0"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Supplier
                                </div>
                                <div class="text-muted">
                                    {{ $suppliers }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-category-filled" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                            stroke-width="0" fill="currentColor"></path>
                                        <path
                                            d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                            stroke-width="0" fill="currentColor"></path>
                                        <path
                                            d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                            stroke-width="0" fill="currentColor"></path>
                                        <path d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z"
                                            stroke-width="0" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Produk
                                </div>
                                <div class="text-muted">
                                    {{ $produkMasuk }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-users-group" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    User
                                </div>
                                <div class="text-muted">
                                    {{ $user }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-2 align-items-center mt-5">
                <div class="col-md-6 col-lg-6 align-self-start">
                    <div class="card mt-0">
                        <div class="card-header">
                            <h3 class="card-title">Daftar produk dengan stok kurang dari 10</h3>
                        </div>
                        <table class="table card-table table-vcenter">
                            <thead>
                                <tr>
                                    <th>Nama barang</th>
                                    <th colspan="2">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produkKurangDariSepuluh as $produk)
                                <tr>
                                    <td>{{ $produk->nama_produk_masuk }}</td>
                                    <td>
                                        <span class="badge bg-danger">
                                            {{ $produk->kuantitas_produk_masuk }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 align-self-start">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chart barang paling populer</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
        if (sessionStorage.getItem("loggedIn") === "true") {
            Swal.fire({
                title: 'Berhasil Login!',
                text: '',
                icon: 'success',
                confirmButtonText: 'Oke'
            });
            sessionStorage.setItem("loggedIn", "false");
        }
    });
    </script>



    <script>
        var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Jumlah Beli',
            data: @json($jumlahBeli)
        }],
        xaxis: {
            categories: @json($namaProdukMasuk)
        },
        title: {
            text: 'Barang Paling Populer',
            align: 'center'
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
    </script>

    @endsection
