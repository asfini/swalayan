<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
    </div>
    <form action="proses/barang.php?aksi=simpan" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?php 
                include 'koneksi.php';
                $querykode = mysqli_query($koneksi, 
                "SELECT max(id_barang) as idterbesar FROM barang");
                $data = mysqli_fetch_array($querykode);
                $id_barang = $data['idterbesar'];
                $urutan = (int) substr($id_barang, 3, 3);
                $urutan++;
                $huruf = "BRG";
                $idbarang = $huruf . sprintf("%03s", $urutan);
                ?>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-10">
                    <input type="text" name="id_barang" value="<?php echo $idbarang ?>" readonly
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="text" name="stok" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" onchange="readURL(this);" name="gambar" class="form-control" />
                    <img id="blah" src="#" alt="your image" width="300px" height="300px"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-default">Reset</button></button>
                <button type="submit" class="btn btn-info  float-right">Simpan</button>
            </div>
        </div>
    </form>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data barang</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($data = mysqli_fetch_array($query)) {
          ?>
                <tr>
                    <td><?php echo $data['id_barang'] ?></td>
                    <td><?php echo $data['nama_barang'] ?></td>
                    <td><?php echo $data['harga'] ?></td>
                    <td><?php echo $data['stok'] ?></td>
                    <td><img src="gambar/<?php echo $data['gambar'] ?>" width="100px" height="100px"></td>
                    <td>
                        <a href="admin.php?page=edit_barang&id_barang=<?php echo $data['id_barang'] ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="proses/barang.php?aksi=delete&id_barang=<?php echo $data['id_barang'] ?>"
                            class="btn btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

    </div>

</div>

