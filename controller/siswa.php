<?php 

require 'koneksi.php';

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
    global $conn;
    $nisn = htmlspecialchars($data["nisn"]);
    $nama_siswa = htmlspecialchars($data["nama_siswa"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO siswa VALUES ('', '$nisn', '$nama_siswa', '$kelas', '$jenis_kelamin', '$nohp', '$jurusan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows();
}

function ubah($data) {
    global $conn;
    $nisn = htmlspecialchars($data["nisn"]);
    $nama_siswa = htmlspecialchars($data["nama_siswa"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "UPDATE siswa SET 
    
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows();
}

function cari($keyword){
    $query = "SELECT * FROM siswa WHERE
        nisn            LIKE '%$keyword%' OR
        nama_siswa      LIKE '%$keyword%' OR
        kelas           LIKE '%$keyword%' OR
        jenis_kelamin   LIKE '%$keyword%' OR
        nohp            LIKE '%$keyword%' OR
        jurusan         LIKE '%$keyword%' 
    ";

    return query($query);
}

?>