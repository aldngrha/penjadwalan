<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Sistem Penjadwalan</div>
                        <a class="nav-link active" href="/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($_SESSION["role_id"] == 'admin') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php">Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php">Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php">Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php">Data Kelas</a>
                                    <a class="nav-link" href="/data-master/data-role/role.php">Data Role Pengguna</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Penjadwalan
                            </a>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="/user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data User
                            </a>
                        <?php elseif ($_SESSION["role_id"] == 'guru') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php">Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php">Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php">Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php">Data Kelas</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penjadwalan
                            </a>                                
                        <?php elseif ($_SESSION["role_id"] == 'siswa') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php">Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php">Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php">Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php">Data Kelas</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Penjadwalan
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
