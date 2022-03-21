<?php 

// session
session_start();

if ($_SESSION["role"] != "user") {
    header("location: auth/login.php");
}

require 'controller/siswa.php';

$siswa = query("SELECT * FROM siswa ORDER BY id ASC");

if (isset($_POST["cari"])) {
  $siswa = cari($_POST["keyword"]);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slides.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>ASI | Daftar Siswa</title>
  </head>
  <body class="bg">
   
  <?php include 'layouts/navbar.php'; ?>

   <div class="container top">
        <div class="row">
            <div class="col-md-6">
                <div class="slider">
                    <div class="wrapper">
                        <img src="img/slide-1.jpg">
                        <img src="img/slide-3.jpg">
                        <img src="img/slide-8.jpg">
                        <img src="img/slide-9.jpg">
                    </div>
                </div>
            </div>
            <div class="col-md-6 daftar">
              <div class="container-fluid">
                <h3 class="mt-3 mb-3">Daftar Siswa SMK Negeri 2 Langsa</h3>
                <div class="title title-search">
                  <form action="" method="POST">
                    <div class="input-group mb-3 mb-5">
                      <input type="text" name="keyword" class="form-control" placeholder="Cari siswa.." autofocus>
                      <button class="btn btn-primary" name="cari" type="submit" id="button-addon2">Cari</button>
                    </div>
                  </form>
                  
                  <div class="content">
                      <?php if(isset($_POST["keyword"])) : ?>
                      <?php foreach ($siswa as $sw) : ?>
                        <div class="siswa">
                          <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 
                                  <?= $sw["nama_siswa"] ?>
                                </button>
                                
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <h5><?= $sw["jurusan"] ?></h5>
                                  <h6><?= $sw["kelas"] ?></h6> 
                                  <h6><code><?= $sw["nisn"] ?></code></h6>
                                  <h6><?= $sw["jenis_kelamin"] ?></h6>
                                  <h6><?= $sw["nohp"] ?></h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tombol">
                          <a href="form.php?id=<?= $sw["id"] ?> & kelas=<?= $sw['kelas'] ?> & jurusan=<?= $sw["jurusan"] ?>" class="btn btn-lg bg-primary text-white"><i class="fas fa-fw fa-paper-plane"></i></a> 
                        </div>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
   </div> 
  <?php include 'layouts/footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
