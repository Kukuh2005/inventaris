<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">INVENTARIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">IVN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($_SERVER['REQUEST_URI'] == '/dashboard') ? 'active' : '' ?>">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>                
            </li>
            <li class="menu-header">Master Data</li>
            <li class="dropdown 
            <?= ($_SERVER['REQUEST_URI'] == '/master-barang' ||
            $_SERVER['REQUEST_URI'] == '/kategori-aset' ||
            $_SERVER['REQUEST_URI'] == '/subkategori-aset' ||
            $_SERVER['REQUEST_URI'] == '/merek' ||
            $_SERVER['REQUEST_URI'] == '/lokasi') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/master-barang') ? 'active' : '' ?>"><a class="nav-link" href="/master-barang">Master Barang</a></li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/kategori-aset') ? 'active' : '' ?>"><a class="nav-link" href="">Kategori Aset</a></li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/subkategori-aset') ? 'active' : '' ?>"><a class="nav-link" href="">Subkategori Aset</a></li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/merek') ? 'active' : '' ?>"><a class="nav-link" href="">Merek</a></li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/satuan') ? 'active' : '' ?>"><a class="nav-link" href="">Satuan</a></li>
                    <li class="<?= ($_SERVER['REQUEST_URI'] == '/lokasi') ? 'active' : '' ?>"><a class="nav-link" href="">Lokasi</a></li>
                </ul>
            </li>
        </ul>

        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> -->
    </aside>
</div>
