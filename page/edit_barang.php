<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Data Barang</h3>
  </div>
  <?php
  include 'koneksi.php';
  $id_barang = $_GET['id_barang'];
  $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
  $data = mysqli_fetch_array($query);
  ?>
  <form action="proses/proses_barang.php?aksi=update" method="post" class="form-horizontal">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID Barang</label>
        <div class="col-sm-10">
          <input type="text" name="id_barang" value="<?php echo $data['id_barang'] ?>" readonly class="
                        form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Barang</label>
        <div class="col-sm-10">
          <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class=" form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class=" form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
          <input type="text" name="stok" value="<?php echo $data['stok'] ?>" class=" form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
          <input type="file" onchange="readURL(this);" name="gambar" class="form-control" />
          <img id="blah" src="gambar/<?php echo $data['gambar'] ?>" width="300px" height="300px" />
        </div>
      </div>
      <div class="card-footer">
        <a href="admin.php?page=barang" class="btn btn-default">Back</a>
        <button type="submit" class="btn btn-info float-right">Update</button>
      </div>
    </div>
  </form>
</div>