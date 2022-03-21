<?php 

// sessiom
session_start();

if (isset($_SESSION["role"])) {
    header("Location: home.php");
}

// ambil koneksi
require '../controller/koneksi.php';

// logika
if (isset($_POST["login"]) ) {
    // tangkap data yang dikirimkan
	$kode_guru = $_POST["kode_guru"];
	$password = $_POST["password"];
	$nama_guru = $_POST["nama_guru"];

    // query tabel tblogin
	$result = mysqli_query($conn, "SELECT * FROM guru WHERE kode_guru = '$kode_guru' AND password='$password'");

	// cek username
	if( mysqli_num_rows($result) > 0 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
			if($row['role']=="user"){

            // berfungsi membuat session
            $_SESSION['nama_guru'] =  $row['nama_guru'];
            $_SESSION['role'] = "user";

            //berfungsi mengalihkan ke halaman user
            echo "
                <script>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Berhasil', 
                            text: 'Anda Berhasil Masuk!', 
                            icon: 'success', 
                            timer: 3000
                        }); 
                    },10);
                    window.setTimeout(function(){ window.location.replace('../index.php'); } ,3000);
                </script>

            ";
        }else if($row['role']=="admin"){

            // berfungsi membuat session
            $_SESSION['nama_guru'] = $row['nama_guru'];
            $_SESSION['role'] = "admin";

            // berfungsi mengalihkan ke halaman admin
            echo "
                <Script>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Berhasil', 
                            text: 'Anda Berhasil Masuk sebagai Admin!', 
                            icon: 'success', 
                            timer: 3000
                        }); 
                    },10);
                    window.setTimeout(function(){ window.location.replace('../admin/dashboard.php'); } ,3000);
                </Script>
            ";
        }else{

            // berfungsi mengalihkan alihkan ke halaman login kembali
            echo "
                <Script>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Gagal', 
                            text: 'Anda Gagal Masuk!', 
                            icon: 'error', 
                            timer: 3000
                        }); 
                    },10);
                    window.setTimeout(function(){ window.location.replace('login.php'); } ,3000);
                </Script>
            ";
        }	
	}else {
        echo "
                <Script>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Gagal', 
                            text: 'Anda Gagal Masuk!', 
                            icon: 'error', 
                            timer: 3000
                        }); 
                    },10);
                    window.setTimeout(function(){ window.location.replace('login.php'); } ,3000);
                </Script>
            ";
    }

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASI | Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-3">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 bg-white">
                                <img src="../img/flame-3.png" width="400" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Masuk!</h1>
                                    </div>
                                    <form class="user" action="" id="login" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="kode_guru" class="form-control form-control-user"
                                                id="kode_guru" 
                                                placeholder="Masukkan Kode Petugas...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Masukkan Password">
                                        </div>
                                        
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Keluar
                                        </button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>

</body>

</html>