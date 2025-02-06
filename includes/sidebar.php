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
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php"><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php"><div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php"><div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php"><div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>Data Kelas</a>
                                    <a class="nav-link" href="/data-master/data-role/role.php"><div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>Data Role Pengguna</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penjadwalan
                            </a>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="/data-master/data-user/user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data User
                            </a>
                        <?php elseif ($_SESSION["role_id"] == 'guru') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php"><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php"><div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php"><div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php"><div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>Data Kelas</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penjadwalan
                            </a>                                
                        <?php elseif ($_SESSION["role_id"] == 'siswa') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-matpel/matpel.php"><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Data Mata Pelajaran</a>
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php"><div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-jurusan/jurusan.php"><div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>Data Jurusan</a>
                                    <a class="nav-link" href="/data-master/data-kelas/kelas.php"><div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>Data Kelas</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/penjadwalan/penjadwalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penjadwalan
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
