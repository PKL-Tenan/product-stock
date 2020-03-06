<?php 
    include '../koneksi.php';

    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM pemasukan WHERE id = '$id'");

    mysqli_query($koneksi, "DELETE FROM pemasukan_detail WHERE id_pemasukan = '$id'");

    header('location: pemasukan.php?pesan=delete');
