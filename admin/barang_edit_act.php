<?php 
    include '../koneksi.php';

    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];

    mysqli_query($koneksi, "UPDATE barang SET kode_barang = '$kode', nama_barang = '$nama', jumlah_small = '$small', jumlah_medium = '$medium', jumlah_large = '$large' WHERE id_barang = '$id'");

    header('location: barang.php?pesan=edit');
?>