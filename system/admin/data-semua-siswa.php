<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>DATA SELURUH SISWA </title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

?>
<!-- Begin Page Content -->``
<div class="container-fluid">
    <div class="row mb-5 mt-4 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">DATA SISWA SMK BINA ESSA</h4>
                    <a href="tambah-siswa.php" class=" p-2 btn btn-sm  btn-dark text-white float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  hover" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th>No</th>
                                    <th>Nisn</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Kelas</th>
                                    <th>No Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas  ORDER BY nis ASC");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td><?php echo $data['nisn']; ?></td>
                                        <td><?php echo $data['nis']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>******</td>
                                        <td><?php echo $data['nama_kelas']; ?></td>
                                        <td><?php echo $data['no_tlp']; ?></td>
                                        <td align="center">
                                            <div class="btn-group btn-group-md" role="group" aria-label="Basic example">

                                                <a href="edit-siswa.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit?"><i class="fa fa-pencil"></i></a>
                                                <a href="hapus-siswa.php?nisn=<?php echo $data['nisn']; ?>" onClick="return confirm('Yakin Akan Menghapus Data Siswa?');" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Hapus?"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                <?php $no++;
                                }
                                ?>
                            </tbody>

                        </table>
                        <br>
                        <a href="report-datasiswa.php" class=" p-2 btn btn-sm btn-dark text-white float-right" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>