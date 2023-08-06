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

                            <h4 class="text-light text-uppercase mt-5">selamat datang siswa</h4>
                        </div>
                    </div>
                    <!-- akhir top-nav -->
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark ">
                        <img href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border" src="../../assets/img/logo-bines.jpg" alt="logo" width="110" height="130">
                        <div class="bottom-border mt-n3 pb-2">
                            <a class="nav-link text-light text-uppercase text-center"><?php echo $_SESSION["siswa"]["nama"]; ?></a>
                        </div>
                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item">
                                <a href="../siswa/home.php" class="nav-link text-white p-3 mb-2 current">
                                    <i class="fa fa-home text-light fa-lg mr-3"></i>HOME
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../logout-siswa.php" class="nav-link text-white p-3 mb-2 sidebar-link" onClick="return confirm('Yakin anda akan keluar?');">
                                    <i class="fa fa-sign-out text-light fa-lg mr-3"></i>LOGOUT
                                </a>
                            </li>
                            <!-- akhir sidebar -->

                    </div>
                </div>
            </div>
    </nav>