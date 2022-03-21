<?php 

// session
session_start();

if ($_SESSION["role"] != "user") {
    header("location: auth/login.php");
}

require 'controller/riwayat.php';

$id_surat = $_GET["id_surat"];

$cetak = query("SELECT * FROM izin WHERE id_surat = $id_surat")[0];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- style -->
    <link rel="stylesheet" href="css/cetak.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>ASI | Home</title>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
                <img src="img/kop surat.png" alt="">
        </div>
    </div>
    <div class="container-fluid top cetak">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-5 mt-3 font-weight-bold"><u>SURAT KETERANGAN</u></h2>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-4">
                <p class="mb-1">Kepada,</p>
                <p class="mb-1">Yth : Bapak/Ibu Guru</p>
                <p class="mb-1">Yang mengajar</p>
                <p class="mb-1">Di</p>
                <p class="mb-1"><?= $cetak["tujuan_surat"] ?></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p class="mb-1">Dengan hormat,</p>
                <p class="mb-1">Dengan ini kami sampaikan kepada Bapak/Ibu, bahwa siswa yang bernama :</p>
                <p class="ms-4 mb-1">Nama : <?= $cetak["nama_siswa"] ?></p>
                <p class="ms-4 mb-1">Kelas : <?= $cetak["kelas"] ?> <?= $cetak["jurusan"] ?></p>
                <p class="mb-1">Tidak dapat mengikuti pelajaran sebagaimana biasanya, dikarenakan : <?= $cetak["keterangan"] ?> selama, <?= $cetak["jangka_waktu"] ?></p>
                <p class="mb-1">Demikianlan surat keterangan ini kami sampaikan atas perhatiannya kami ucapkan terimakasih.</p>
            </div>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-md-4">
                <p class="mb-1">Langsa, <?= $cetak["created_at"] ?></p>
                <p class="mb-5">Guru Piket</p>
                <p><?= $cetak["petugas"] ?></p>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="script.js"></script>

  </body>
</html>
