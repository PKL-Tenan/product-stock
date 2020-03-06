<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id = '$id'");

mysqli_query($koneksi, "DELETE FROM pengeluaran_detail WHERE id_pengeluaran = '$id'");

header('location: pengeluaran.php?pesan=delete');
