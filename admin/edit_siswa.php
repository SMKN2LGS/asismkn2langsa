<?php
session_start();
include '../controller/koneksi.php';

$id = $_GET['id'];
$nisn = $_GET['nisn'];
$nama = $_GET['nama_siswa'];
$kelas = $_GET['kelas'];
$jk = $_GET['jenis_kelamin'];
$hp = $_GET['nohp'];
$jurusan = $_GET['jurusan'];

$data = mysqli_query($conn,"UPDATE siswa SET nisn='$nisn', nama_siswa='$nama', jurusan='$jurusan', jenis_kelamin='$jk', nohp ='$hp', kelas='$kelas' WHERE id =$id ");


header('refresh:0; url = murid.php?task=edit&modal=none');
 ?>