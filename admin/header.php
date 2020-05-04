<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/select2.min.css">
    <title>Sistem Informasi Stok</title>
</head>

<body style="background: #F0F0F0">
    <?php
    session_start();
    if ($_SESSION['status'] != 'logged_in') {
        header('location: ../index.php?pesan=belum_login');
    }
    ?>

    <nav class="navbar navbar-dark bg-dark navbar-expand" style="border-radius: 0px">
        <a class="navbar-brand" href="#">Product Stock</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-fw fa-home"></i> Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-book"></i> Data Perusahaan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="barang.php"><i class="fas fa-fw fa-box"></i> Data
                            Barang</a>
                        <a class="dropdown-item" href="pemasukan.php"><i class="fas fa-fw fa-arrow-alt-circle-down"></i>
                            Data
                            Pemasukan</a>
                        <a class="dropdown-item" href="pengeluaran.php"><i class="fas fa-fw fa-arrow-alt-circle-up"></i>
                            Data
                            Pengeluaran</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-tools"></i> Pengaturan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="ganti_pass.php"><i class="fas fa-fw fa-key"></i> Ganti Password</a>
                    </div>
                </li>
            </ul>
            <a class="btn btn-danger btn-sm my-2 my-sm-0" href="logout.php"><i class="fas fa-fw fa-sign-out-alt"></i>
                Logout</a>
        </div>
    </nav>