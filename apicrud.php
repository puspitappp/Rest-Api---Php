<?php
header('Content-Type: application/json; charset=utf-8');

$koneksi = mysqli_connect("localhost", "root", "", "apicrud");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    $array_data = array();
    while ($data = mysqli_fetch_assoc($query)) {
        $array_data[] = $data;
    }
    echo json_encode($array_data);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $sql = "INSERT INTO barang (nama_barang, stok, harga) VALUES('$nama_barang', '$stok', '$harga')";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "Berhasil..."
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "Gagal..."
        ];
        echo json_encode([$data]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "Berhasil..."
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "Gagal..."
        ];
        echo json_encode([$data]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $_GET['id'];
    $nama_barang = $_GET['nama_barang'];
    $stok = $_GET['stok'];
    $harga = $_GET['harga'];

    $sql = "UPDATE barang SET nama_barang='$nama_barang', stok='$stok', harga='$harga' WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "Berhasil..."
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "Gagal..."
        ];
        echo json_encode([$data]);
    }
}