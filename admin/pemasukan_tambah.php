<?php include 'header.php'; ?>

<?php 
    include '../koneksi.php';
    $result = mysqli_query($koneksi, "SELECT MAX(kode_pemasukan) AS kode FROM pemasukan");
    $data = mysqli_fetch_array($result);
    $kodeTransaksi = $data['kode'];

    $urutan =  (int) substr($kodeTransaksi, 4, 5);
    $urutan++;

    $newKode = "MSK-" . sprintf("%05s", $urutan);
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Transaksi Pemasukan</h4>
        </div>
        <div class="card-body">
            <form action="pemasukan_tambah_act.php" method="post">
                <div class="form-group">
                    <label for="kode">Kode Transaksi</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $newKode; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Transaksi</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>

                <br>

                <table class="table table-bordered table-striped" id="tbl_barang">
                    <thead>
                        <tr>
                            <th width="70%">Nama Barang</th>
                            <th width="10%">Small</th>
                            <th width="10%">Medium</th>
                            <th width="10%">Large</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="barang[]" class="form-control select-barang" required>
                                    <?php 
                                        $dataBarang = mysqli_query($koneksi, "SELECT * FROM barang");
                                        while($db = mysqli_fetch_array($dataBarang)){
                                    ?>
                                    <option value="<?= $db['id_barang']; ?>"><?= $db['nama_barang']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="small[]" id="small[]" class="form-control"></td>
                            <td><input type="number" name="medium[]" id="medium[]" class="form-control"></td>
                            <td><input type="number" name="large[]" id="large[]" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" name="add" id="add" class="btn btn-sm btn-success float-right">
                    <i class="fas fa-fw fa-plus"></i> Tambah Barang
                </button>
                <button type="submit" class="btn btn-block btn-primary float-left mt-3">
                    <i class="fas fa-fw fa-cart-plus"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>