<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <p class="brand-link">
        <img src="{{ asset('/templates/admin/dist/img/logo-ims.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="image">
                <img src="{{ asset('/templates/admin/dist/img/admin-image.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>

            <div class="info">
                <p class="text-uppercase">
                    {{ Auth::user()->name }}
                </p>
            </div>


        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar text-center" value="{{ date('D, d F Y') }}">
                {{-- <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div> --}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $mutasiActive ?? '' }}">
                        <i class="nav-icon fa fa-desktop"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role != 'guest')
                    <li class="nav-item {{ $menuOpen ?? '' }}">
                        <a href="#" class="nav-link {{ $menuActive ?? '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user') }}" class="nav-link {{ $userActive ?? '' }} ">
                                    <i class="fa fa-user nav-icon text-dark"></i>
                                    <p class="text-dark">User</p>
                                </a>
                            </li>
                            <li class="nav-item {{ $barangOpen ?? '' }}">
                                <a href="#" class="nav-link {{ $barangActive ?? '' }}">
                                    <i class="fa fa-box nav-icon text-dark"></i>
                                    <p>
                                        Barang
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('master.data') }}"
                                            class="nav-link {{ $masterActive ?? '' }}">
                                            <i class="fa fa-caret-right nav-icon"></i>
                                            <p>Master Barang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('data') }}" class="nav-link {{ $dataActive ?? '' }}">
                                            <i class="fa fa-caret-right nav-icon"></i>
                                            <p>Data Barang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('history') }}" class="nav-link"
                                            {{ $historyActive ?? '' }}>
                                            <i class="fa fa-caret-right nav-icon"></i>
                                            <p>History Barang</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('supplier') }}" class="nav-link {{ $suplierActive ?? '' }}">
                                    <i class="fa fa-truck nav-icon text-dark"></i>
                                    <p class="text-dark">Suplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer') }}" class="nav-link {{ $customerActive ?? '' }}">
                                    <i class="fa fa-users nav-icon text-dark"></i>
                                    <p class="text-dark">Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('warehouse') }}" class="nav-link {{ $warehouseActive ?? '' }}">
                                    <i class="fa fa-warehouse nav-icon text-dark"></i>
                                    <p class="text-dark">Gudang</p>
                                </a>
                        </ul>
                    </li>

                    <li class="nav-item {{ $transaksiOpen ?? '' }}">
                        <a href="#" class="nav-link {{ $transaksiActive ?? '' }}">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>
                                Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('po') }}" class="nav-link {{ $poActive ?? '' }}">
                                    <i class="nav-icon fa fa-plus-square text-dark"></i>
                                    <p>
                                        Input Data Pre Order
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ncr_vendor') }}" class="nav-link {{ $NcrvendorActive ?? '' }}">
                                    <i class="nav-icon fa fa-plus-square text-dark"></i>
                                    <p>
                                        NCR Vendor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pib') }}" class="nav-link {{ $pibActive ?? '' }}">
                                    <i class="nav-icon fa fa-plus-square text-dark"></i>
                                    <p>
                                        Input Data PIB
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link {{ $NcrCustActive ?? '' }}">
                                    <i class="nav-icon fa fa-plus-square text-dark"></i>
                                    <p>
                                        NCR Customer
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ $reportOpen ?? '' }}">
                        <a href="#" class="nav-link {{ $reportActive ?? '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('report_document') }}"
                                    class="nav-link {{ $reportDocument ?? '' }}">
                                    <i class="nav-icon fa fa-file-alt text-dark"></i>
                                    <p>
                                        Barang Perdokumen
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ $reportMutasi ?? '' }}">
                                    <i class="nav-icon fa fa-sign-out-alt text-dark"></i>
                                    <p>
                                        Data Keluar
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ $reportOut ?? '' }}">
                                    <i class="nav-icon fa fa-list-alt text-dark"></i>
                                    <p>
                                        Stok Barang
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
