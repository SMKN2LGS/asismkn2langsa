<?php
session_start();
include '../controller/koneksi.php';

$id = $_GET['id_surat'];
$nama = $_GET['nama_siswa'];
$kelas = $_GET['kelas'];
$ket = $_GET['keterangan'];
$jangka = $_GET['jangka_waktu'];
$tujuan = $_GET['tujuan_surat'];
$dibuat = $_GET['dibuat'];
$petugas = $_GET['petugas'];

$data = mysqli_query($conn,"UPDATE izin SET nama_siswa='$nama', kelas='$kelas', keterangan='$ket', jangka_waktu='$jangka', tujuan_surat='$tujuan', created_at='$dibuat', petugas='$petugas' WHERE id_surat =$id ");


header('refresh:0; url = riwayat.php?task=edit&modal=none');
 ?>