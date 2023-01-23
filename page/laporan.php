<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>

    <div class="card-body">
        <form action="" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-2">
                    <input type="date" name="tanggal_awal" " class=" form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" name="tanggal_akhir" " class=" form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="tampilkan" class="btn btn-info">Tampilkan</button>
                </div>
            </div>
        </form>

        <table class=" table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
        include 'koneksi.php';
        if (isset($_POST["tampilkan"])) {
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang AND transaksi.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $data['id_transaksi'] ?></td>
                    <td><?php echo $data['tanggal'] ?></td>
                    <td><?php echo $data['nama_barang'] ?></td>
                    <td><?php echo $data['jumlah'] ?></td>
                    <td><?php echo $data['total'] ?></td>
                </tr>
            </tbody>
            <?php } ?>
            <tfoot>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>