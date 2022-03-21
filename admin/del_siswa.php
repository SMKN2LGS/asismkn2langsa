<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];


$data = mysqli_query($conn,"DELETE FROM siswa where id = $id ");


header('refresh:0; url = murid.php?task=delete&modal=none');
 ?>