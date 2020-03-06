<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <title>Sistem Informasi Stok - Dokumen</title>
</head>

<body>
    <?php 
        session_start();
        if ($_SESSION['status'] != 'logged_in') {
            header('location: ../index.php?pesan=belum_login');
        }
    ?>

    <div class="container mt-5">
        <div class="col-md-10">
            <h2>PT. Matahari Surya Mitra Pangan</h2>
            <h4>Jalan Industri Mangliawan 88 A</h4>
            <h5>Kabupaten Malang</h5>

            <p>No. SK : AHU-0011264.AH.01.01.TAHUN 2017</p>
            <p><b>Dokumen Transaksi Pemasukan</b></p>

            <br>

            <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $dokumen = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id = '$id'");
                while($d = mysqli_fetch_array($dokumen)){
            ?>

            <table class="table">
                <tr>
                    <th width="20%">No. Dokumen</th>
                    <th>:</th>
                    <td><?= $d['kode_pemasukan']; ?></td>
                </tr>
                <tr>
                    <th width="20%">Tanggal Transaksi</th>
                    <th>:</th>
                    <td><?= date('d M Y', strtotime($d['tanggal'])); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <td></td>
                </tr>
            </table>

            <h5 class="text-center">Daftar Barang</h5>
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="20%">Kode Barang</th>
                    <th width="50%">Nama Barang</th>
                    <th width="10%">Small</th>
                    <th width="10%">Medium</th>
                    <th width="10%">Large</th>
                </tr>

                <?php 
                    $id_dokumen = $d['id'];
                    $detail_barang = mysqli_query($koneksi, "SELECT p.*, b.nama_barang, b.kode_barang FROM pemasukan_detail AS p, barang AS b WHERE p.id_pemasukan = '$id' AND p.id_barang = b.id_barang");
                    while($db = mysqli_fetch_array($detail_barang)){ 
                ?>

                <tr>
                    <td><?= $db['kode_barang']; ?></td>
                    <td><?= $db['nama_barang']; ?></td>
                    <td><?= $db['small']; ?></td>
                    <td><?= $db['medium']; ?></td>
                    <td><?= $db['large']; ?></td>
                </tr>

                <?php } ?>
            </table>

            <?php } ?>
        </div>
    </div>

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>