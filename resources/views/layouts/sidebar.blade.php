<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/{{auth()->user()->role}}/dashboard">INVENTARIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/{{auth()->user()->role}}/dashboard">IVN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/dashboard') ? 'active' : '' ?>">
                <a href="/{{auth()->user()->role}}/dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>                                
            </li>
            <li class="menu-header">Master Data</li>
            <li class="dropdown <?= (in_array($_SERVER['REQUEST_URI'], [
                '/' . auth()->user()->role . '/master-barang',
                '/' . auth()->user()->role . '/kategori-asset',
                '/' . auth()->user()->role . '/subkategori-asset',
                '/' . auth()->user()->role . '/merk',
                '/' . auth()->user()->role . '/satuan',
                '/' . auth()->user()->role . '/lokasi',
                '/' . auth()->user()->role . '/distributor',
            ])) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/master-barang') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/master-barang">Master Barang</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/kategori-asset') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/kategori-asset">Kategori Asset</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/subkategori-asset') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/subkategori-asset">Subkategori Asset</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/merk') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/merk">merk</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/satuan') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/satuan">Satuan</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/lokasi') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/lokasi">Lokasi</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/distributor') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/distributor">Distributor</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Pengelolaan Inventaris</li>
            <li class="dropdown <?= (in_array($_SERVER['REQUEST_URI'], [
                '/' . auth()->user()->role . '/pengadaan',
                '/' . auth()->user()->role . '/mutasi-lokasi',
                '/' . auth()->user()->role . '/depresiasi',
                '/' . auth()->user()->role . '/hitung-depresiasi'
            ])) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span>Inventarisasi</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/pengadaan') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/pengadaan">Pengadaan</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/mutasi-lokasi') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/mutasi-lokasi">Mutasi Lokasi</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/depresiasi') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/depresiasi">Depresiasi</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/hitung-depresiasi') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/hitung-depresiasi">Hitung Depresiasi</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Opname & Laporan</li>
            <li class="dropdown <?= (in_array($_SERVER['REQUEST_URI'], [
                '/' . auth()->user()->role . '/opname',
                '/' . auth()->user()->role . '/laporan'
            ])) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-bar"></i><span>Monitoring</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/opname') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/opname">Opname</a>
                    </li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/' . auth()->user()->role . '/laporan') ? 'active' : '' ?>">
                        <a class="nav-link" href="/{{auth()->user()->role}}/laporan">Laporan</a>
                    </li>                    
                </ul>
            </li>
        </ul>
    </aside>
</div>