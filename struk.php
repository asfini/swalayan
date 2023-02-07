<script>
  window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Belanja</title>
</head>

<body width="600px">
  <center>
    <h1><b>e-Swalayan<b></b></h1>
    <p>Jl. Yos Sudarso KM.8</p>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi, barang, pelanggan, user WHERE
      transaksi.id_barang = barang.id_barang AND
      transaksi.id_pelanggan = pelanggan.id_pelanggan AND transaksi.id_user = user.id_user");
    $data = mysqli_fetch_array($query);
    ?>
    <table width="300px">
      <tr>
        <td>Invoice</td>
        <td><?php echo $data['id_transaksi'] ?></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td><?php echo $data['tanggal'] ?></td>
      </tr>
      <tr>
        <td>Kasir</td>
        <td><?php echo $data['nama_user'] ?></td>
      </tr>
    </table>
<br>
    <table width="300px">
      <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Jumlah</td>
        <td>Total</td>
      </tr>

      <tr>
        <td>
          <?php echo $data['id_transaksi'] ?>
        </td>
        <td>
          <?php echo $data['nama_barang'] ?>
        </td>
        <td>
          <?php echo $data['jumlah'] ?>
        </td>
        <td>
          <?php echo $data['total'] ?>
        </td>
      </tr>
    </table>
    <br><br><br>
    <p>Selamat datang kembali</p>

  </center>
</body>

</html>