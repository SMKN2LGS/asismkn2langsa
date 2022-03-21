<?php
session_start();
include '../controller/koneksi.php';

$nama = $_GET['nama_siswa'];
$kelas = $_GET['kelas'];
$ket = $_GET['keterangan'];
$jangka = $_GET['jangka_waktu'];
$tujuan = $_GET['tujuan_surat'];
$dibuat = $_GET['created_at'];
$petugas = $_GET['petugas'];

$data = mysqli_query($conn,"INSERT INTO izin (nama_siswa, kelas, keterangan, jangka_waktu, tujuan_surat, created_at, petugas) VALUES ('$nama', '$kelas', '$ket', '$jangka', '$tujuan', '$dibuat', '$petugas') ");


header('refresh:0; url = riwayat.php?task=none&modal=none');
 ?>