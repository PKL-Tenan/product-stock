<?php include 'header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Data Barang</h4>
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
                } else if ($_GET['pesan'] == 'edit') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data berhasil diubah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>';
                } else if ($_GET['pesan'] == 'hapus') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Data berhasil dihapus!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>';
                }
            }
            ?>
            <a href="barang_tambah.php" class="btn btn-primary btn-sm float-left">
                <i class="fas fa-fw fa-plus"></i> Tambah Data
            </a>
            <form action="barang.php" method="get" class="form-inline float-right">
                <input type="text" class="form-control form-control-sm mr-2" name="keyword" id="keyword" placeholder="Cari Barang">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-search"></i> Cari
                </button>
            </form>

            <br><br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="15%">Kode Barang</th>
                        <th width="25%">Nama Barang</th>
                        <th width="6%">Small</th>
                        <th width="6%">Medium</th>
                        <th width="6%">Large</th>
                        <th width="16%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    if (isset($_GET['keyword'])) {
                        $keyword = $_GET['keyword'];
                        $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang LIKE '%" . $keyword . "%'");
                    } else {
                        $data = mysqli_query($koneksi, "SELECT * FROM barang");
                    }
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['kode_barang']; ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td><?= $d['jumlah_small']; ?></td>
                            <td><?= $d['jumlah_medium']; ?></td>
                            <td><?= $d['jumlah_large']; ?></td>
                            <td>
                                <a href="barang_edit.php?id=<?= $d['id_barang']; ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a>
                                <a href="barang_delete.php?id=<?= $d['id_barang']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>