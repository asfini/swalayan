<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data Pelanggan</h3>
    </div>
    <form action="proses/pelanggan.php?aksi=simpan" method="post" class="form-horizontal">
        <?php 
                include 'koneksi.php';
                $querykode = mysqli_query($koneksi, 
                "SELECT max(id_pelanggan) as idterbesar FROM pelanggan");
                $data = mysqli_fetch_array($querykode);
                $id_pelanggan = $data['idterbesar'];
                $urutan = (int) substr($id_pelanggan, 3, 3);
                $urutan++;
                $huruf = "PEL";
                $idpelanggan = $huruf . sprintf("%03s", $urutan);
                ?>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pelanggan" value="<?php echo $idpelanggan ?>" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pelanggan" class="form-control">
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
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control">
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
        <h3 class="card-title">Data Pelanggan</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID pelanggan</th>
                    <th>Nama Pelnggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        while ($data = mysqli_fetch_array($query)) {
          ?>
                <tr>
                    <td><?php echo $data['id_pelanggan'] ?></td>
                    <td><?php echo $data['nama_pelanggan'] ?></td>
                    <td><?php echo $data['jenis_kelamin'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td>
                        <a href="admin.php?page=edit_pelanggan&id_pelanggan=<?php echo $data['id_pelanggan'] ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="proses/pelanggan.php?aksi=delete&id_pelanggan=<?php echo $data['id_pelanggan'] ?>"
                            class="btn btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID pelanggan</th>
                    <th>Nama Pelnggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

    </div>

</div>