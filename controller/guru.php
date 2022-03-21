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
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $jk = htmlspecialchars($data["jk"]);
    $hp = htmlspecialchars($data["hp"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO guru VALUES ('', '$kode', '$nama', '$jurusan', '$jk', '$hp', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id_guru = $data["id_guru"];
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $jk = htmlspecialchars($data["jk"]);
    $hp = htmlspecialchars($data["hp"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE guru SET (
        kode = '$kode',
        nama = $nama,
        jurusan = '$jurusan',
        jk = '$jk',
        hp = '$hp', 
        gambar = '$gambar'

        WHERE id_guru = $id_guru
        )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_guru){
    global $conn;
    mysqli_query($conn, "DELETE FROM guru WHERE id_guru = $id_guru");

    return mysqli_affected_rows();
}

?>