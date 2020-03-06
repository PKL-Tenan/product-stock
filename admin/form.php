<?php 
    include '../koneksi.php';
    $dataBarang = mysqli_query($koneksi, "SELECT * FROM barang");
    echo '<td><select name="barang[]" class="form-control select-barang">';
    while ($db = mysqli_fetch_array($dataBarang)) {
        echo '<option value="' . $db['id_barang'] . '"> '. $db['nama_barang'] . '</option>';
    }
    echo '</select></td>';
    echo '<td><input type="number" name="small[]" id="small[]" class="form-control"></td>
    <td><input type="number" name="medium[]" id="medium[]" class="form-control"></td>
    <td><input type="number" name="large[]" id="large[]" class="form-control"></td>';
    mysqli_free_result($dataBarang);
?>