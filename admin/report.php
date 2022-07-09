<?php
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?php echo $row['nama'];?></title>
  </head>
  <body>
  	&nbsp
  	<div class="text-center fs-2">Daftar Barang Pinjaman</div>
  	&nbsp
  	<div class="container">
    <table class="table table-hover table-striped">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama User</th>
      <th scope="col">Nim</th>
      <th scope="col">kelas</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Stock</th>
      <th scope="col">Tgl Peminjaman</th>
      <th scope="col">Tgl Pengembalian</th>
      <th scope="col">Foto</th>
      <th scope="col">Acc</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php

      $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

   
      $no = 1; 

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['nim']; ?></td>
      <td><?php echo $row['kelas']; ?></td>
      <td><?php echo $row['nama_barang']; ?></td>
      <td><?php echo $row['stock_pinjam']; ?></td>
      <td><?php echo $row['tgl_pinjam']; ?></td>
      <td><?php echo $row['tgl_kembali']; ?></td>
      <td><img src="../admin/img/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
      <td><?php echo $row['acc'];?></td>
      <td><p class="btn btn-warning text-dark">Di <?php echo $row['status'];?></p></td>
    </tr>
    <?php
        $no++; 
      }
      ?>
  </tbody>
</table>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	window.print();
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>