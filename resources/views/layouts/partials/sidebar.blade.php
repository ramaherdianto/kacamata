<aside class="navbar navbar-vertical navbar-expand-lg p-2" data-bs-theme="dark" style="background-color:  #ff8533">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-unique"
            aria-controls="sidebar-menu-unique" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark p-4">
            <a href="/">
                <img src="{{ asset('dist/glasses.png')}}" width="250" height="70" alt="Tabler">
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu-unique">
            <ul class="navbar-nav pt-lg-3">

                <div class=" ml-2 p-2 mt-2 font-bold text-white">Dashboard</div>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard*') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard.index') }}"
                        style="{{ Route::is('admin.dashboard*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>

                <div class=" ml-2 p-2 mt-2 font-bold text-white">Data Master</div>
                @can('kategoriproduks.index')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.category*') ? 'active' : '' }}"
                        href="{{ route('admin.category.index') }}"
                        style="{{ Route::is('admin.category*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4h6v6h-6z"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Kategori Produk
                        </span>
                    </a>
                </li>
                @endcan

                @can('suppliers.index')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.supplier*') ? 'active' : '' }}"
                        href="{{ route('admin.supplier.index') }}"
                        style="{{ Route::is('admin.supplier*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Data Supplier
                        </span>
                    </a>
                </li>
                @endcan

                <div class=" ml-2 p-2 mt-2 font-bold text-white">Management Product</div>

                @can('produks.index')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.produk*') ? 'active' : '' }}"
                        href="{{ route('admin.produk.index') }}"
                        style="{{ Route::is('admin.produk*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4h6v6h-6z"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Produk Masuk
                        </span>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.stock*') ? 'active' : '' }}"
                        href="{{ route('admin.stock.index') }}"
                        style="{{ Route::is('admin.stock*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-unsplash"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 11h5v4h6v-4h5v9h-16zm5 -7h6v4h-6z"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Stok Produk
                        </span>
                    </a>
                </li>


                <div class=" ml-2 p-2 mt-2 font-bold text-white">Transaksi</div>
                @can('customers.index')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.customer*') ? 'active' : '' }}"
                        href="{{ route('admin.customer.index') }}"
                        style="{{ Route::is('admin.customer*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Customer
                        </span>
                    </a>
                </li>
                @endcan

                <div class=" ml-2 p-2 mt-2 font-bold text-white">Management Profile</div>
                @can('users.index')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.user*') ? 'active' : '' }}"
                        href="{{ route('admin.user.index') }}"
                        style="{{ Route::is('admin.user*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            User
                        </span>
                    </a>
                </li>
                @endcan

                @can('roles.index')

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.role*') ? 'active' : '' }}"
                        href="{{ route('admin.role.index') }}"
                        style="{{ Route::is('admin.role*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- SVG icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                            </svg>
                        </span>
                        
                        <span class="nav-link-title">
                            Role User
                        </span>
                    </a>
                </li>

                @endcan

                <div class=" ml-2 p-2 mt-2 font-bold text-white">Laporan</div>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.report*') ? 'active' : '' }}"
                        href="{{ route('admin.report.index') }}"
                        style="{{ Route::is('admin.report*') ? 'background-color: #333;' : '' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4h6v6h-6z"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Laporan Keluar
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
