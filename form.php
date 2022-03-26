<?php 

// session
session_start();

if ($_SESSION["role"] != "user") {
    header("location: auth/login.php");
}

require 'controller/form.php';
require 'controller/koneksi.php';

$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id");
$siswa = mysqli_fetch_array($result);

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "
            <Script>
                setTimeout(function () { 
                    Swal.fire({ 
                        title: 'Berhasil', 
                        text: 'Data Berhasil Ditambahkan!', 
                        icon: 'success', 
                        timer: 3000, 
                        showConfirmButton: true 
                    }); 
                },10);
                window.setTimeout(function(){ window.location.replace('riwayat.php'); } ,3000);
            </Script>
        ";
    }else{
        echo "
            <script>
                setTimeout(function () { 
                    Swal.fire({ 
                        title: 'Gagal', 
                        text: 'Data Gagal Ditambahkan!', 
                        icon: 'warning', 
                        timer: 1000, 
                        showConfirmButton: true 
                    }); 
                },10);
                window.setTimeout(function(){ window.location.replace('riwayat.php'); } ,2000);
            </script>
        ";
    }
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
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

    <!-- style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>ASI | Home</title>
  </head>
  <body class="bg">

  <?php include 'layouts/navbar.php' ?>
  
   <div class="container top index">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="image">
                    <img src="img/logo.jpg" class="img" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mt-2">Form Tambah Surat Izin</h3>
                <form action="" method="POST">
                    <div class="mb-2">
                        <label for="nama_siswa"  class="form-label">Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa["nama_siswa"] ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" name="kelas"  class="form-control" id="kelas" value="<?= $siswa["kelas"] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $siswa["jurusan"] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-2">
                            <label for="created_at" class="form-label">Tanggal</label>
                            <input type="text" name="created_at" class="form-control" id="created_at" value="<?= tgl_indo(date('Y-m-d')); ?>" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <?php 
                        $kelas = $_GET["kelas"];
                        $jurusan = $_GET["jurusan"];
                        $ruang = mysqli_query($conn, "SELECT * FROM kelas WHERE kelas = '$kelas' AND jurusan = '$jurusan' ");
                        $result = mysqli_fetch_array($ruang);   
                        $hari = date('l');
                        ?>
                        <div class="mb-2">
                            <label for="tujuan_surat" class="form-label">Tujuan Surat</label>
                            <input type="text" value="<?php echo $result[$hari]; ?>" name="tujuan_surat" class="form-control" readonly>
                        </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="petugas" class="form-label">Petugas</label>
                        <input type="text" name="petugas" class="form-control" id="petugas" value="<?= $_SESSION["nama_guru"] ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <select name="keterangan" id="keterangan" class="form-select">
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                                <select name="jangka_waktu" id="jangka_waktu" class="form-select">
                                    <option value="1 Hari">1 Hari</option>
                                    <option value="2 Hari">2 Hari</option>
                                    <option value="3 Hari">3 Hari</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
   </div> 

  <?php include 'layouts/footer.php' ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></>

    <script src="js/script.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

  </body>
</html>
