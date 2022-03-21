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
	$nama_siswa = htmlspecialchars($data["nama_siswa"]);
}

?>