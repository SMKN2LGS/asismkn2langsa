<?php
session_start();
include '../controller/koneksi.php';

$nisn = $_GET['nisn'];
$nama = $_GET['nama_siswa'];
$kelas = $_GET['kelas'];
$jk = $_GET['jenis_kelamin'];
$hp = $_GET['nohp'];
$jurusan = $_GET['jurusan'];

$data = mysqli_query($conn,"INSERT INTO siswa (nisn, nama_siswa, kelas, jenis_kelamin, nohp, jurusan) VALUES ('$nisn', '$nama', '$kelas', '$jk', '$hp', '$jurusan') ");


header('refresh:0; url = murid.php?task=none&modal=none');
 ?>