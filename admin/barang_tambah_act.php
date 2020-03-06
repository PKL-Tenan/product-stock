<?php 
    include '../koneksi.php';

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];

    mysqli_query($koneksi, "INSERT INTO barang VALUES ('', '$kode', '$nama', '$small', '$medium', '$large')");
    header('location: barang.php?pesan=tambah');
?>