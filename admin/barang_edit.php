<?php include 'header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Barang</h4>
        </div>
        <div class="card-body">
            <?php 
                include '../koneksi.php';
                $id = $_GET['id'];

                $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id'");
                while($d = mysqli_fetch_array($data)){
            ?>
            <form action="barang_edit_act.php" method="post">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input type="hidden" name="id" id="id" value="<?= $d['id_barang']; ?>">
                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $d['kode_barang']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $d['nama_barang']; ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="small">Jumlah Small</label>
                        <input type="number" name="small" id="small" class="form-control"
                            value="<?= $d['jumlah_small']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="medium">Jumlah Medium</label>
                        <input type="number" name="medium" id="medium" class="form-control"
                            value="<?= $d['jumlah_medium']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="large">Jumlah Large</label>
                        <input type="number" name="large" id="large" class="form-control"
                            value="<?= $d['jumlah_large']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-fw fa-pencil-alt"></i> Edit Data
                    </button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>