<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Data Transaksi</h3>
  </div>
  <div class="card-body">
    <div class="col-md-12">
      <?php
      include 'koneksi.php';
      $querykode = mysqli_query(
        $koneksi,
        "SELECT max(id_transaksi) as idterbesar FROM transaksi"
      );
      $data = mysqli_fetch_array($querykode);
      $id_transaksi = $data['idterbesar'];
      $urutan = (int) substr($id_transaksi, 3, 3);
      $urutan++;
      $huruf = "INV";
      $idtransaksi = $huruf . sprintf("%03s", $urutan);
      ?>
      <form action="proses/proses_transaksi.php?aksi=simpan" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ID Transaksi</label>
              <div class="col-sm-10">
                <input type="text" name="id_transaksi" value="<?php echo $idtransaksi ?>" readonly class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ID Pelanggan</label>
              <div class="col-sm-10">
                <select name="id_pelanggan" class="form-control">
                  <option disabled="" selected="">Pilih Pelanggan</option>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $data['id_pelanggan'] ?>">
                      <?php echo $data['nama_pelanggan'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <?php $Now = new DateTime('now', new DateTimeZone('Asia/Taipei')); ?>
                <input type="text" name="tanggal" value=" <?php echo $Now->format('Y-m-d H:i:s'); ?>" readonly
                  class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Admin</label>
              <div class="col-sm-10">
                <input type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" readonly
                  class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ID Barang</label>
              <div class="col-sm-10">
                <select name="id_barang" id="id_barang" onchange="changeValueBarang(this.value)" class="form-control">
                  <option disabled="" selected="">Pilih Barang</option>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM barang");
                  $jsBarang = "var dtBarang = new Array();\n";
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $data['id_barang'] ?>"> <?php echo $data['nama_barang'] ?> </option>
                    <?php
                    $jsBarang .= "dtBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "'};\n"
                      ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" name="harga" id="harga" readonly class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-10">
                <input type="text" name="jumlah" id="jumlah" onkeyup="hitung()" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Total</label>
              <div class="col-sm-10">
                <input type="text" name="total" id="total" readonly class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="reset" class="btn btn-default">Reset</button></button>
          <button type="submit" class="btn btn-info  float-right">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Transaksi</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>Pelanggan</th>
          <th>Tanggal</th>
          <th>Barang</th>
          <th>Jumlah</th>
          <th>Total</th>
          <th>User</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
        while ($data = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td>
              <?php echo $data['id_transaksi'] ?>
            </td>
            <td>
              <?php echo $data['id_pelanggan'] ?>
            </td>
            <td>
              <?php echo $data['tanggal'] ?>
            </td>
            <td>
              <?php echo $data['id_barang'] ?>
            </td>
            <td>
              <?php echo $data['jumlah'] ?>
            </td>
            <td>
              <?php echo $data['total'] ?>
            </td>
            <td>
              <?php echo $data['id_user'] ?>
            </td>
            <td>
              <a href="proses/proses_transaksi.php?aksi=delete&id_transaksi=<?php echo $data['id_transaksi'] ?>"
                class="btn btn-danger">Hapus</a>
              <a href="struk.php?id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-success">Print</a>
            </td>
          </tr>

        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID Transaksi</th>
          <th>Pelanggan</th>
          <th>Tanggal</th>
          <th>Barang</th>
          <th>Jumlah</th>
          <th>Total</th>
          <th>User</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<script>

  <?php echo $jsBarang; ?>

  function changeValueBarang(x) {
    document.getElementById('harga').value = dtBarang[x].harga;
  }

  function hitung() {
    var harga = document.getElementById('harga').value;
    var jumlah = document.getElementById('jumlah').value;
    var total = harga * jumlah;
    document.getElementById('total').value = total;
  }

</script>