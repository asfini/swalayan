<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Data User</h3>
  </div>
  <?php
  include 'koneksi.php';
  $id_user = $_GET['id_user'];
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
  $data = mysqli_fetch_array($query);
  ?>
  <form action="proses/proses_user.php?aksi=update" method="post" class="form-horizontal">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID User</label>
        <div class="col-sm-10">
          <input type="text" name="id_user" value="<?php echo $data['id_user'] ?>" class="form-control" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-10">
          <input type="text" name="nama_user" value="<?php echo $data['nama_user'] ?>"class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select class="form-control" name="jenis_kelamin">
            <option value="<?php echo $data['jenis_kelamin'] ?>" selected disabled hidden><?php echo $data['jenis_kelamin'] ?></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" value="<?php echo $data['username'] ?>"class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" value="<?php echo $data['password'] ?>"class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-10">
          <input type="text" name="no_hp" value="<?php echo $data['no_hp'] ?>"class="form-control">
        </div>
      </div>
      <div class="card-footer">
        <a href="admin.php?page=user"class="btn btn-default">Back</a>
         
        <button type="submit" class="btn btn-info float-right">Update</button>        
      </div>
    </div>
  </form>
</div>