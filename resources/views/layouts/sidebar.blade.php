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
                <a href="/{{auth()->user()->role}}/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>                
            </li>
            <li class="menu-header">Master Data</li>
            <li class="dropdown <?= (in_array($_SERVER['REQUEST_URI'], [
                '/' . auth()->user()->role . '/master-barang',
                '/' . auth()->user()->role . '/kategori-asset',
                '/' . auth()->user()->role . '/subkategori-asset',
                '/' . auth()->user()->role . '/merk',
                '/' . auth()->user()->role . '/satuan',
                '/' . auth()->user()->role . '/lokasi'
            ])) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
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
                </ul>
            </li>
        </ul>
    </aside>
</div>