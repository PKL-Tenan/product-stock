<?php include 'header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Edit Transaksi Pemasukan</h4>
        </div>
        <div class="card-body">
            <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id = '$id'");
                while($p = mysqli_fetch_array($pemasukan)){
            ?>

            <form action="pemasukan_edit_act.php" method="post">
                <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                <div class="form-group">
                    <label for="kode">Kode Transaksi</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $p['kode_pemasukan']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Transaksi</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $p['tanggal']; ?>">
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
                        <?php 
                            $id_dokumen = $p['id'];
                            $barang = mysqli_query($koneksi, "SELECT * FROM pemasukan_detail WHERE id_pemasukan = '$id_dokumen'");
                            while($b = mysqli_fetch_array($barang)){
                        ?>

                        <tr>
                            <td>
                                <select name="barang[]" class="form-control select-barang" required>
                                    <?php 
                                        $data = mysqli_query($koneksi, "SELECT * FROM barang");
                                        while($dt = mysqli_fetch_array($data)){
                                    ?>
                                    <option
                                        <?php if($dt['id_barang'] == $b['id_barang']) { echo "selected='selected'"; } ?>
                                        value="<?= $dt['id_barang']; ?>"><?= $dt['nama_barang']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="small[]" id="small[]" class="form-control"
                                    value="<?= $b['small']; ?>"></td>
                            <td><input type="number" name="medium[]" id="medium[]" class="form-control"
                                    value="<?= $b['medium']; ?>"></td>
                            <td><input type="number" name="large[]" id="large[]" class="form-control"
                                    value="<?= $b['large']; ?>"></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-sm btn-success float-right" name="add" id="add">
                    <i class="fas fa-fw fa-plus"></i> Tambah Barang
                </button>
                <button type="submit" class="btn btn-primary btn-block float-left mt-3">
                    <i class="fas fa-fw fa-cart-plus"></i> Submit
                </button>
            </form>

            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>