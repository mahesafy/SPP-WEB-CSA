<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>DATA KELAS</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


?>

<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">DATA KELAS SMK BINA ESSA</h4>
                    <a href="tambah-kelas.php" class=" p-2 btn btn-sm btn-dark text-white float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Jurusan</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?php echo $data['nama_kelas']; ?></td>
                                        <td class="text-center"><?php echo $data['jurusan']; ?></td>
                                        <td class="text-center">
                                            <a href="edit-kelas.php?id=<?php echo $data['id_kelas']; ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit?"><i class="fa fa-pencil"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="hapus-kelas.php?id=<?php echo $data['id_kelas']; ?>" onClick="return confirm('Yakin Akan Menghapus Data Kelas?');" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Hapus?"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>