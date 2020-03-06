<?php 
    include '../koneksi.php';

    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($koneksi, "UPDATE pemasukan SET kode_pemasukan = '$kode', tanggal = '$tanggal' WHERE id = '$id'");

    $barang = $_POST['barang'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];

    mysqli_query($koneksi, "DELETE FROM pemasukan_detail WHERE id_pemasukan = '$id'");

    for ($i = 0; $i < count($barang); $i++) { 
        if ($barang[$i] != "") {
            mysqli_query($koneksi, "INSERT INTO pemasukan_detail VALUES ('', '$id', '$barang[$i]', '$small[$i]', '$medium[$i]', '$large[$i]')");
        }
    }

    header('location: pemasukan.php');
?>