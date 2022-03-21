<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION["role"] != "admin") {
    echo '<script>alert("Login Terlebih Dahulu !")</script>'; 
    echo '<script>window.location.replace("admin_login.php");</script>';
}

?>  
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASI Admin - Riwayat</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ASI Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dasbor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="guru.php?task=none&modal=none">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Guru</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link " href="murid.php?task=none&modal=none">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="riwayat.php?task=none&modal=none">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    <span>Riwayat</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="laporan.php?task=none&modal=none">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Laporan</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Keluar</span></a>
            </li>

 <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-4">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_guru']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2  text-gray-800">Riwayat Surat Izin</h1>

                    <a href="?task=edit&modal=none" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                class="fas fa-ellipsis-v text-white-50"></i> Ubah</a>

                    <a href="?task=delete&modal=none" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                class="fas fa-trash text-white-50"></i> Hapus</a>

                    <a href="#" data-toggle="modal" data-target="#TambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus text-white-50"></i> Tambah</a>


                    


                           
<!-- Tambah Modal-->
    <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Izin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                <form action="tambah_riwayat.php" id="form_edit" method="GET">
            <div class="form-group">
             <label for="pwd">Nama Siswa :</label>
            <input type="text" class="form-control" name="nama_siswa">
            </div>
            <div class="form-group">
             <label for="pwd">Kelas :</label>
            <select name="kelas" class="form-select" aria-label="Default select example">
                         <option value="X">X (Sepuluh)</option>
                         <option value="XI">XI (Sebelas)</option>
                         <option value="XII">XII (Dua Belas)</option>
                    </select>
            </div>
            <div class="form-group">
             <label for="pwd">Keterangan :</label>
            <select name="keterangan" class="form-select" aria-label="Default select example">
                         <option value="Izin">Izin</option>
                         <option value="Sakit">Sakit</option>
                    </select>
            </div>
            <div class="form-group">
             <label for="jk">Jangka Waktu :</label>
            <select name="jangka_waktu" id="jk" class="form-select" aria-label="Default select example">
            <option value="1 Hari">1 Hari</option>
            <option value="2 Hari">2 Hari</option>
            <option value="3 Hari">3 Hari</option>
            </select>
            </div>
            <div class="form-group">
             <label for="pwd">Tujuan Surat :</label>
            <input type="text" class="form-control" name="tujuan_surat">
            </div>
            <div class="form-group">
             <label for="pwd">Tanggal Dibuat :</label>
            <input type="date" class="form-control" name="created_at" >
            </div>
            <div class="form-group">
             <label for="pwd">Petugas :</label>
            <input type="text" class="form-control" name="petugas" >
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary form-control" ><i
                                class="fas fa-plus text-white-50"></i>  Tambah</button>
            </div>
        </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

<?php if ($_GET['task'] == 'none') {
    echo "";
}else{ ?>
<a href="?task=none&modal=none" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                class="fas fa-ban text-white"></i> Batal</a> 

<?php } ?>



                    <!-- DataTales Example -->
                    <div class="card shadow mt-4 mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">

<?php
include '../controller/koneksi.php';

$result = mysqli_query($conn,"SELECT * FROM izin");
?>


                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<?php
$param = $_GET['task'];
 ?>
                                    <thead>
                                        <tr>
                                            <th><?php if ($param == 'none') {
                                                            echo "ID";
                                                        }else{echo "Action";} ?></th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Keterangan</th>
                                            <th>Jangka Waktu</th>
                                            <th>Tujuan Surat</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Petugas</th>

                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php if ($param == 'none') {
                                                            echo "ID";
                                                        }else{echo "Action";} ?></th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Keterangan</th>
                                            <th>Jangka Waktu</th>
                                            <th>Tujuan Surat</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Petugas</th>

                        
                                        </tr>
                                    </tfoot>
                                    <tbody>

<?php if ($_GET['modal'] == 'edit') { 
$id = $_GET['id'];
$tool = mysqli_query($conn,"SELECT * FROM izin where id_surat ='$id'");
$tampil = mysqli_fetch_array($tool)
    ?>
                                        <tr>
                                                <form action="edit_riwayat.php" id="editgr" method="GET">
                                                    <td><a href="#" onclick="document.getElementById('editgr').submit()" class="btn btn-primary">Ubah</a></td>
                                                    <td><input type="text" value="<?php echo $tampil['nama_siswa']?>" name="nama_siswa"></td>
                                                    
                                                    <td>
                                                    <select name="kelas" class="form-select" aria-label="Default select example">
                                                        <option value="<?php echo $tampil['kelas']?>"><?php echo $tampil['kelas']?></option>
                                                        <option value="X">X (Sepuluh)</option>
                                                        <option value="XI">XI (Sebelas)</option>
                                                        <option value="XII">XII (Dua Belas)</option>


                                                    </select>
                                                    </td>
                                                    <td>
                                                        <select name="keterangan" class="form-select" aria-label="Default select example">
<?php if ($tampil['keterangan'] == 'Izin') { ?>
                                                        <option value="Izin">Izin</option>
                                                        <option value="Sakit">Sakit</option>
<?php }else{ ?>
                                                        <option value="Sakit">Sakit</option>
                                                        <option value="Izin">Izin</option>
<?php } ?>

                                                    </select></td>
                                                    <td><input type="text" value="<?php echo $tampil['jangka_waktu']?>" name="jangka_waktu"></td>
                                                    <td>

                                                      <input type="text" value="<?php echo $tampil['tujuan_surat']?>" name="tujuan_surat"></td>


                                                        <input type="hidden" value="<?php echo $tampil['id_surat']?>" name="id_surat">

                                                    </td>
                                                    <td><input type="date" value="<?php echo $tampil['created_at'] ?>" name="dibuat"></td>

                                                    <td><input type="text" value="<?php echo $tampil['petugas']?>" name="petugas"></td>
                                                </form>
                                                </tr>
<?php }else{ ?> 
                                                

<?php
while($row = mysqli_fetch_array($result))
{ ?>
                                        <tr>
                                            <td><?php if($_GET['task'] == 'edit'){ ?>

                                                <a href="riwayat.php?task=edit&modal=edit&id=<?php echo $row['id_surat']?>"   class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                class="fas fa-edit text-white-50"></i>  Ubah</a>


                                            <?php  }elseif($_GET['task'] == 'delete'){ ?>


                 <a href="del_riwayat.php?id=<?php echo $row['id_surat']?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                class="fas fa-trash text-white-50"></i> Hapus</a>









 <!-- Hapus Modal-->
    <div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><input type="text" id="N1" name=""> Klik "hapus" untuk menghapus data. Data yang dihapus tidak dapat di kembalikan !</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="hapus.php?id=<?php echo $row['id_guru']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function Pop(modal) {
    $("#N1").val(modal);
    $("#HapusModal").modal();
}
</script>


                                            <?php  }else{ echo $row['id_surat']; } ?>
                                            </td>
                                            <td><?php echo $row['nama_siswa']?></td>
                                            <td><?php echo $row['kelas']?></td>
                                            <td><?php echo $row['keterangan']?></td>
                                            <td><?php echo $row['jangka_waktu']?></td>
                                            <td><?php echo $row['tujuan_surat']?></td>
                                            <td><?php echo $row['created_at']?></td>
                                            <td><?php echo $row['petugas']?></td>
                                        </tr>
                                         <?php } ?>
                                     <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<!-- Keluar Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akhiri Sesi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" dibawah untuk mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="../auth/logout.php">Keluar</a>
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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>