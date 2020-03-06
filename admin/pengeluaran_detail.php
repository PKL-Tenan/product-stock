<?php include 'header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Detail Transaksi Pengeluaran</h4>
        </div>
        <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $dokumen = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id = '$id'");
        while ($d = mysqli_fetch_array($dokumen)) {
        ?>
            <div class="card-body">
                <a href="pengeluaran_cetak.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-info float-left" target="_blank">
                    <i class="fas fa-fw fa-print"></i> Cetak Dokumen
                </a>
                <br><br>

                <table class="table">
                    <tr>
                        <th width="20%">No. Dokumen</th>
                        <th>:</th>
                        <td><?= $d['kode_pengeluaran']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Tanggal Transaksi</th>
                        <th>:</th>
                        <td><?= date('d M Y', strtotime($d['tanggal'])); ?></td>
                    </tr>
                </table>

                <br>

                <h5 class="text-center">Daftar Barang</h5>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="20%">Kode Barang</th>
                        <th width="50%">Nama Barang</th>
                        <th width="10%">Small</th>
                        <th width="10%">Medium</th>
                        <th width="10%">Large</th>
                    </tr>

                    <?php
                    $id_dokumen = $d['id'];
                    $detail_barang = mysqli_query($koneksi, "SELECT p.*, b.nama_barang, b.kode_barang FROM pengeluaran_detail AS p, barang AS b WHERE p.id_pengeluaran = '$id' AND p.id_barang = b.id_barang");
                    while ($db = mysqli_fetch_array($detail_barang)) {
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

                <a href="pengeluaran.php" class="btn btn-sm btn-danger float-left">
                    <i class="fas fa-fw fa-arrow-left"></i> Kembali
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>