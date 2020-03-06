<?php include 'header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Data Transaksi Pemasukan</h4>
        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == 'tambah') {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Data berhasil ditambahkan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>';
                } else if ($_GET['pesan'] == 'delete') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Data berhasil dihapus!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>';
                }
            }
            ?>

            <a href="pemasukan_tambah.php" class="btn btn-primary btn-sm float-left">
                <i class="fas fa-fw fa-plus"></i> Tambah Data
            </a>
            <form action="pemasukan.php" method="get" class="form-inline float-right">
                <input type="text" class="form-control form-control-sm mr-2" name="keyword" id="keyword"
                    placeholder="Cari Kode Transaksi">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-search"></i> Cari
                </button>
            </form>

            <br><br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="37%">Kode Transaksi</th>
                        <th width="37%">Tanggal Transaksi</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    if (isset($_GET['keyword'])) {
                        $keyword = $_GET['keyword'];
                        $data = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE kode_pemasukan LIKE '%" . $keyword . "%'");
                    }
                    else {
                        $data = mysqli_query($koneksi, "SELECT * FROM pemasukan");
                    }
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['kode_pemasukan']; ?></td>
                        <td><?= date('d M Y', strtotime($d['tanggal'])); ?></td>
                        <td>
                            <a href="pemasukan_detail.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-secondary">
                                <i class="fas fa-fw fa-info"></i> Detail
                            </a>
                            <a href="pemasukan_edit.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-fw fa-pencil-alt"></i> Edit
                            </a>
                            <a href="pemasukan_delete.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-danger">
                                <i class="fas fa-fw fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>