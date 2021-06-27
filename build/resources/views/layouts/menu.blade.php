<li class="{{ Request::is('/') ? 'active' : '' }}">
    <a href="{!! url('/') !!}"><i class="fa fa-home"></i><span>Dashboard</span></a>
</li>

<li class="header text-center">MENU</li>

@if (!Auth::user()->is('logistik') && !Auth::user()->is('dirut'))
    <li class="{{ Request::is('pemesanans*') ? 'active' : '' }}">
        <a href="{!! route('pemesanans.index') !!}"><i class="fa fa-calendar"></i><span>Pemesanan</span></a>
    </li>

    <li class="{{ Request::is('produksis*') ? 'active' : '' }}">
        <a href="{!! route('produksis.index') !!}"><i class="fa fa-flask"></i><span>Produksi</span></a>
    </li>
@endif


@if (Auth::user()->is('admin') || Auth::user()->is('marketing'))
    <li class="{{ Request::is('produks*') && !Request::is('produksis*') ? 'active' : '' }}">
        <a href="{!! route('produks.index') !!}"><i class="fa fa-industry"></i><span>Job Mix Formula</span></a>
    </li>
@endif

@if (Auth::user()->is('admin'))
    <li class="treeview {{ Request::is('pengadaans*') || Request::is('supplier*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-cart-arrow-down"></i> <span>Pengadaan</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('supplier*') ? 'active' : '' }}">
                <a href="{!! route('supplier.index') !!}"><i class="fa fa-circle-o"></i><span>Pemesanan</span></a>
            </li>
            <li class="{{ Request::is('pengadaans*') ? 'active' : '' }}">
                <a href="{!! route('pengadaans.index') !!}"><i class="fa fa-circle-o"></i><span>Penerimaan</span></a>
            </li>
        </ul>
    </li>
@endif

@if (Auth::user()->is('logistik'))
    <li class="{{ Request::is('supplier*') ? 'active' : '' }}">
        <a href="{!! route('supplier.index') !!}"><i class="fa fa-cart-arrow-down"></i><span>Pemesanan Material</span></a>
    </li>
    <li class="{{ Request::is('pengadaans*') ? 'active' : '' }}">
        <a href="{!! route('pengadaans.index') !!}"><i class="fa fa-truck"></i><span>Penerimaan Material</span></a>
    </li>
@endif

@if (Auth::user()->is('admin') || Auth::user()->is('logistik'))
    <li class="{{ Request::is('opnames*') ? 'active' : '' }}">
        <a href="{!! route('opnames.index') !!}"><i class="fa fa-search-minus"></i><span>Material Keluar</span></a>
    </li>
@endif

@if (Auth::user()->is('admin'))
    <li class="treeview {{ Request::is('jabatans*') || Request::is('bahanBakus*') || Request::is('batasPengadaans*') || Request::is('users*') || Request::is('batasPengadaans*') || Request::is('kendaraans*') || Request::is('supirs*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-gear"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @if (Auth::user()->is('admin'))
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i><span>Pegawai</span></a>
                </li>
                <li class="{{ Request::is('jabatans*') ? 'active' : '' }}">
                    <a href="{!! route('jabatans.index') !!}"><i class="fa fa-circle-o"></i>Jabatan</a>
                </li>

                <li class="{{ Request::is('kendaraans*') ? 'active' : '' }}">
                    <a href="{!! route('kendaraans.index') !!}"><i class="fa fa-circle-o"></i><span>Kendaraan</span></a>
                </li>
                <li class="{{ Request::is('supirs*') ? 'active' : '' }}">
                    <a href="{!! route('supirs.index') !!}"><i class="fa fa-circle-o"></i><span>Supir</span></a>
                </li>
            @endif

            @if (Auth::user()->is('logistik') || Auth::user()->is('admin'))
                <li class="{{ Request::is('bahanBakus*') ? 'active' : '' }}">
                    <a href="{!! route('bahanBakus.index') !!}"><i class="fa fa-circle-o"></i>Material</a>
                </li>
            @endif

        </ul>
    </li>
@endif

@if (Auth::user()->is('logistik'))
    <li class="{{ Request::is('kendaraans*') ? 'active' : '' }}">
        <a href="{!! route('kendaraans.index') !!}"><i class="fa fa-truck"></i><span>Kendaraan</span></a>
    </li>
@endif

@if (Auth::user()->is('admin') || Auth::user()->is('logistik'))

    <li class="{{ Request::is('bahanBakuHistories*') ? 'active' : '' }}">
        <a href="{!! route('bahanBakuHistories.index') !!}"><i class="fa fa-list"></i><span>Histori Material</span></a>
    </li>

@endif
