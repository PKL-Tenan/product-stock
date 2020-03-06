<?php include 'header.php'; ?>

<?php 
    include '../koneksi.php';
    $result = mysqli_query($koneksi, "SELECT MAX(kode_barang) AS kode FROM barang");
    $data = mysqli_fetch_array($result);
    $kodeBarang = $data['kode'];

    $urutan = (int) substr($kodeBarang, 4, 3);
    $urutan++;

    $newKode = "BRG-" . sprintf("%03s", $urutan); 
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data Barang</h4>
        </div>
        <div class="card-body">
            <form action="barang_tambah_act.php" method="post">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $newKode; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="small">Jumlah Small</label>
                        <input type="number" name="small" id="small" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="medium">Jumlah Medium</label>
                        <input type="number" name="medium" id="medium" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="large">Jumlah Large</label>
                        <input type="number" name="large" id="large" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fas fa-fw fa-plus"></i> Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>