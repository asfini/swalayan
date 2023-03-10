<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Data User</h3>
  </div>
  <?php
  include 'koneksi.php';
  $querykode = mysqli_query(
    $koneksi,
    "SELECT max(id_user) as idterbesar FROM user"
  );
  $data = mysqli_fetch_array($querykode);
  $id_user = $data['idterbesar'];
  $urutan = (int) substr($id_user, 3, 3);
  $urutan++;
  $huruf = "USR";
  $iduser = $huruf . sprintf("%03s", $urutan);
  ?>
  <form action="proses/proses_user.php?aksi=simpan" method="post" class="form-horizontal">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID User</label>
        <div class="col-sm-10">
          <input type="text" name="id_user" value="<?php echo $iduser ?>" readonly class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-10">
          <input type="text" name="nama_user" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select class="form-control" name="jenis_kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-10">
          <input type="text" name="no_hp" class="form-control">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Simpan</button>
        <button type="reset" class="btn btn-default float-right">Reset</button></button>
      </div>
    </div>
  </form>
</div>

<div class="card">
  <div class="card-header">
    <h3>Data User</h3>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <td>ID User</td>
          <td>Nama User</td>
          <td>Username</td>
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['id_user'] ?></td>
          <td><?php echo $data['nama_user'] ?></td>
          <td><?php echo $data['username'] ?></td>
          <td>
            <a href="admin.php?page=edit_user&id_user=<?php echo $data['id_user'] ?>" class="btn btn-warning">Edit</a>
            <a href="proses/proses_user.php?aksi=delete&id_user=<?php echo $data['id_user']?>" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <td>ID User</td>
          <td>Nama User</td>
          <td>Username</td>
          <td>Aksi</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>