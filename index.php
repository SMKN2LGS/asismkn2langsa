<?php 

// session
session_start();

if ($_SESSION["role"] != "user") {
    header("location: auth/login.php");
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

function getDay($date){
 $datetime = DateTime::createFromFormat('Y-m-d', $date);
 return $datetime->format('l');
}

function getHari($date){
 $day=getDay($date);
 switch ($day) {
  case 'Sunday':
   $hari = 'Minggu';
   break;
  case 'Monday':
   $hari = 'Senin';
   break;
  case 'Tuesday':
   $hari = 'Selasa';
   break;
  case 'Wednesday':
   $hari = 'Rabu';
   break;
  case 'Thursday':
   $hari = 'Kamis';
   break;
  case 'Friday':
   $hari = 'Jum\'at';
   break;
  case 'Saturday':
   $hari = 'Sabtu';
   break;
  default:
   $hari = 'Tidak ada';
   break;
 }
 return $hari;
}


$date = date('y-m-d');

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
   <div class="container top utama">
        <div class="row mt-5">
            <div class="col-md-6 d-flex align-items-center">
                <div class="title">
                <h5 class="mb-5"><?php echo getHari($date); echo ', '; echo tgl_indo(date( 'Y-m-d')); ?></h5>
                    <h2>Aplikasi Surat Izin <br> SMK Negeri 2 Langsa</h2>
                    <p>Surat izin merupakan surat yang berisi keterangan pada sekolah, instansi, unversitas, ataupun tempat kerja dikarenakan adanya keperluan yang tidak dapat ditinggalkan sehingga tidak dapat hadir seperti biasanya. Surat izin harus dibuat sebenar-benarnya dan dapat dipertanggungjawabkan.</p>

                    <a href="daftar.php" class="btn btn-primary">Mulai !</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <img src="img/flame-4.png" width="580" alt="" class="mt-5">
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
