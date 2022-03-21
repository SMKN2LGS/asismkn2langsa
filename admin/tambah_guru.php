<?php
session_start();
include '../controller/koneksi.php';

$id = $_GET['id_guru'];
$kode = $_GET['kode_guru'];
$nama = $_GET['nama_guru'];
$jurusan = $_GET['jurusan'];
$jk = $_GET['jenis_kelamin'];
$hp = $_GET['nohp'];
$gambar = $_GET['gambar'];

$data = mysqli_query($conn,"INSERT INTO guru (kode_guru, nama_guru, jurusan, jenis_kelamin, nohp, gambar) VALUES ('$kode', '$nama', '$jurusan', '$jk', '$hp', '$gambar') ");


header('refresh:0; url = guru.php?task=none&modal=none');
 ?>