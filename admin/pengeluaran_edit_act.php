<?php 
    include '../koneksi.php';

    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($koneksi, "UPDATE pengeluaran SET kode_pengeluaran = '$kode', tanggal = '$tanggal' WHERE id = '$id'");

    $barang = $_POST['barang'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];

    mysqli_query($koneksi, "DELETE FROM pengeluaran_detail WHERE id_pengeluaran = '$id'");

    for ($i = 0; $i < count($barang); $i++) { 
        if ($barang[$i] != "") {
            mysqli_query($koneksi, "INSERT INTO pengeluaran_detail VALUES ('', '$id', '$barang[$i]', '$small[$i]', '$medium[$i]', '$large[$i]')");
        }
    }

    header('location: pengeluaran.php?pesan=edit');
?>