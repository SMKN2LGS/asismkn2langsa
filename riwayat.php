<?php 

// session
session_start();

if ($_SESSION["role"] != "user") {
    header("location: auth/login.php");
}

require 'controller/riwayat.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM izin"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$riwayat = query("SELECT * FROM izin ORDER BY id_surat DESC LIMIT $awalData, $jumlahDataPerHalaman");

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
    <link rel="stylesheet" href="css/style.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>ASI | Riwayat</title>
    </head>
    <body class="bg">

    <?php include 'layouts/navbar.php' ?>

    <div class="container top">
        <div class="row">
            <div class="col-md-12">
                <h3>Daftar Surat Izin</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Keterangan</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no= $awalData + 1; foreach ($riwayat as $rw) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $rw["nama_siswa"] ?></td>
                                <td><?= $rw["kelas"] ?></td>
                                <td><?= $rw["jurusan"] ?></td>
                                <td><?= $rw["keterangan"] ?></td>
                                <td><?= $rw["jangka_waktu"] ?></td>
                                <td><?= $rw["created_at"] ?></td>
                                <td><?= $rw["petugas"] ?></td>
                                <td>
                                    <a target="_blank" href="cetak.php?id_surat=<?= $rw["id_surat"] ?>" class="btn btn-warning btn-lg text-white"><i class="fas fa-print fa-lg"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>   
                <div class="row">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if( $halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <?php if($halamanAktif < $jumlahHalaman) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>           
                </div>
            </div>
        </div>
    </div>
    <?php include 'layouts/footer.php' ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

  </body>
</html>
