<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "produk_stock");
    if (mysqli_connect_errno()) {
        echo 'Koneksi database gagal : ' . mysqli_connect_error();
    }
