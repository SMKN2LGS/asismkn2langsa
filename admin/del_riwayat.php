<?php
session_start();
include '../controller/koneksi.php';

$id = $_GET['id'];


$data = mysqli_query($conn,"DELETE FROM izin where id_surat = $id ");


header('refresh:0; url = riwayat.php?task=delete&modal=none');
 ?>