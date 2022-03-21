<?php 

require 'koneksi.php';

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;

}

function tambah($data){
	global $conn;
	$nama_siswa     = htmlspecialchars($data["nama_siswa"]);
	$kelas          = htmlspecialchars($data["kelas"]);
	$jurusan        = htmlspecialchars($data["jurusan"]);
	$keterangan     = htmlspecialchars($data["keterangan"]);
	$jangka_waktu   = htmlspecialchars($data["jangka_waktu"]);
	$tujuan_surat   = htmlspecialchars($data["tujuan_surat"]);
	$created_at     = htmlspecialchars($data["created_at"]);
	$petugas        = htmlspecialchars($data["petugas"]);

    $query = "INSERT INTO izin VALUES 
            ('', '$nama_siswa', '$kelas', '$jurusan', '$keterangan', '$jangka_waktu', '$tujuan_surat', '$created_at', '$petugas')    
        ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>