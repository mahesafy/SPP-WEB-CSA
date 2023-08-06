<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>DATA ADMIN</title>';
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
                    <h4 class="float-left font-weight-bold text-dark pt-2">DATA USER</h4>
                    <a href="tambah-admin.php" class=" p-2 btn btn-sm btn-dark text-white float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = mysqli_query($conn, "SELECT * FROM user ");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>

                                        <td class="text-center"><?php echo $data['nama_user']; ?></td>

                                        <td class="text-center"><?php echo $data['username']; ?></td>
                                        <td class="color-blue-grey-lighter text-center">*****</td>
                                        <td class="text-center"><?php echo $data['level']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-md" role="group" aria-label="Basic example">
                                                <a href="edit-admin.php?id=<?php echo $data['id_user']; ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit?"><i class="fa fa-pencil"></i></a>
                                                <a href="hapus-admin.php?id=<?php echo $data['id_user']; ?>" onClick="return confirm('Yakin Akan Menghapus Data Admin?');" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Hapus?"><i class="fa fa-trash"></i></a>
                                            </div>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>