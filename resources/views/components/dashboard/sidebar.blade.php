<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            @if (Auth::user()->is_admin)
            <ul class="nav navbar-nav">
                <li class="menu-title">Dashboard</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-tachometer"></i>Dashboard </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.user-config.index') }}"><i class="menu-icon fa fa-group"></i>Customer</a>
                </li>
                <li class="menu-title">Paket Internet</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('admin.package.index') }}"><i class="menu-icon fa fa-tags"></i>Paket Aktif</a>
                </li>
                <li class="menu-title">Pengeluaran Kas</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('admin.spend.index') }}"><i class="menu-icon fa fa-money"></i>Expenditure</a>
                </li>
                <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('admin.billing.index') }}"><i class="menu-icon fa fa-file-text"></i>Tagihan Bulanan</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.histori') }}"><i class="menu-icon fa fa-list-alt"></i>Histori Tagihan</a>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav">
                <li class="menu-title">Dashboard</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('user.dashboard') }}"><i class="menu-icon fa fa-tachometer"></i>Dashboard </a>
                </li>
                <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('user.billing') }}"><i class="menu-icon fa fa-file-text"></i>Monthly Billing</a>
                </li>
                <li class="menu-title">Bantuan</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-phone"></i>Contact Support</a>
                </li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
