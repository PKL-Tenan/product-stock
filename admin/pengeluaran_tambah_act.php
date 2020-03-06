<?php 
    include '../koneksi.php';

    $kode = $_POST['kode'];
    $tanggal = $_POST['tanggal'];
    $tgl = date('Y-m-d', strtotime($tanggal));

    mysqli_query($koneksi, "INSERT INTO pengeluaran VALUES ('', '$kode', '$tgl')");

    $last_id = mysqli_insert_id($koneksi);

    $barang = $_POST['barang'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];

    for ($i = 0; $i < count($barang); $i++) { 
        if ($barang[$i] != "") {
            mysqli_query($koneksi, "INSERT INTO pengeluaran_detail VALUES ('', '$last_id', '$barang[$i]', '$small[$i]', '$medium[$i]', '$large[$i]')");
        }
    }

    header('location: pengeluaran.php?pesan=tambah');
?>