<?php
session_start();
include 'koneksi.php';

$id = $_GET['id_guru'];
$kode = $_GET['kode_guru'];
$nama = $_GET['nama_guru'];
$jurusan = $_GET['jurusan'];
$jk = $_GET['jenis_kelamin'];
$hp = $_GET['nohp'];
$gambar = $_GET['gambar'];

$data = mysqli_query($conn,"UPDATE guru SET kode_guru='$kode', nama_guru='$nama', jurusan='$jurusan', jenis_kelamin='$jk', nohp ='$hp', gambar='$gambar' WHERE id_guru =$id ");


header('refresh:0; url = guru.php?task=edit&modal=none');
 ?>