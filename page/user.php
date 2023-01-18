<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Data User</h3>
  </div>
  <form action="proses/user.php?aksi=simpan" method="post" class="form-horizontal">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID User</label>
        <div class="col-sm-10">
          <input type="text" name="id_user" class="form-control">
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
    <h3 class="card-title">DataTable with default features</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      
    <thead>
        <tr>
          <th>ID User</th>
          <th>Nama</th>
          <th>username</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while ($data = mysqli_fetch_array($query)) {
          ?>
        <tr>
          <td><?php echo $data['id_user'] ?></td>
          <td><?php echo $data['nama_user'] ?></td>
          <td><?php echo $data['username'] ?></td>
        </tr>  
          
      <?php } ?>      
        </tbody>      
      <tfoot>
        <tr>
          <th>ID User</th>
          <th>Nama</th>
          <th>Username</th>
        </tr>
      </tfoot>
    </table>
    
  </div>

</div>