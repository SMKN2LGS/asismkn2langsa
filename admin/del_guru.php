<?php
session_start();
include '..controller/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"DELETE FROM guru where id_guru = $id ");


header('refresh:0; url = guru.php?task=delete&modal=none');
 ?>