<?php
session_start();
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    echo "<script>
    alert('Anda Harus Login Admin');
    document.location.href = '../../login-admin.php';
    </script>";
}

//pemisah hak akses level
else if ($_SESSION['level'] != "Admin") {
    //jika bukan admin tidak bisa masuk, redirect ke halaman error
    echo "<script>
    alert('Anda Harus Login Admin');
    document.location.href = '../../login-admin.php';
    </script>";
}
