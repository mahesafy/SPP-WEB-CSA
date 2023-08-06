<?php //merubah waktu kedalam format indonesia
require '../config/koneksi.php';
$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
$bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
?>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- top nav -->
                    <div class=" col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-3 top-navbar ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="text-light text-uppercase mt-5">Pembayaran SPP SMK BINA ESSA</h4>

                                <h6 class="text-light"><?php echo "" . $hari[date("w")] . ", " . date("j") . " " . $bln[date("n")] . " " . date("Y");
                                                        ""; ?></h6>
                            </div>

                            <h4 class="text-light text-uppercase mt-5">selamat datang admin</h4>
                        </div>
                    </div>
                    <!-- akhir top-nav -->
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark ">
                        <img href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border" src="../../assets/img/logo-bines.jpg" alt="logo" width="110" height="130">
                        <div class="bottom-border mt-n3 pb-2">

                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username]' ");
                            $data = mysqli_fetch_array($query); ?>
                            <a class="nav-link text-white text-uppercase text-center"><?php echo $data['nama_user']; ?></a>
                        </div>
                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item">
                                <a href="../admin/home.php" class="nav-link text-white p-3 mb-2 current">
                                    <i class="fa fa-home text-light fa-lg mr-3"></i>Home
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-white p-3 mb-2 sidebar-link dropdown-toggle" href="../admin/data-semua-siswa.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-database text-light fa-lg mr-3"></i>Rekap Data
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../admin/data-admin.php">Data User</a>
                                    <a class="dropdown-item" href="../admin/data-kelas.php">Data Kelas</a>
                                    <a class="dropdown-item" href="../admin/data-semua-siswa.php">Data Siswa</a>
                                    <a class="dropdown-item" href="../admin/data-spp.php">Data SPP</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white p-3 mb-2 sidebar-link dropdown-toggle" href="../admin/data-semua-siswa.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-graduate text-light fa-lg mr-3"></i>Data Siswa
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <a class="dropdown-item" href="../admin/data-siswa.php?kelas=<?php echo $row['nama_kelas']; ?>">Kelas<span>
                                                <?php echo $row['nama_kelas']; ?></span></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="../admin/transaksi.php" class="nav-link text-white p-3 mb-2 sidebar-link">
                                    <i class="fa fa-university text-light fa-lg mr-3"></i>Transaksi
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../admin/data-laporan.php" class="nav-link text-white p-3 mb-2 sidebar-link">
                                    <i class="fa fa-file text-light fa-lg mr-3"></i>Laporan
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../../logout-admin.php" class="nav-link text-white p-3 mb-2 sidebar-link" onClick="return confirm('Yakin anda akan keluar?');">
                                    <i class="fa fa-sign-out text-light fa-lg mr-3"></i>Logout
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- akhir sidebar -->


                </div>
            </div>
        </div>
    </nav>