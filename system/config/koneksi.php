<?php
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'db_sppbines');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
