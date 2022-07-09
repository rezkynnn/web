<?php
include 'header-admin.php';
include 'koneksi.php';
?>
<div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-card-list"></i>
                                        List Peminjaman Barang
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex bd-highlight">
  <div class="p-2 w-100 bd-highlight">
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="" method="GET">
                <div class="input-group">
                    <input class="form-control" type="text" name="kata_cari" placeholder="Cari Data..." aria-label="Cari Data..." aria-describedby="btnNavbarSearch" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
                    <button class="btn btn-primary" type="submit" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
  </div>
  <div class="p-2 flex-shrink-1 bd-highlight"><a href="report.php" target="_BLANK" class="btn btn-primary"><i class="bi bi-printer"></i> Print</a></div>
</div>
                                        
            <br>
            <br>

<table class="table table-hover table-striped">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama User</th>
      <th scope="col">Nim</th>
      <th scope="col">kelas</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah Alat</th>
      <th scope="col">Tgl Pinjam</th>
      <th scope="col">Tgl Kembali</th>
      <th scope="col">Foto</th>
      <th scope="col">Acc</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'koneksi.php';
    if (isset($_GET['kata_cari'])) {
        $kata_cari = $_GET['kata_cari'];
        $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode WHERE nim like '%".$kata_cari."%' OR nama like '%".$kata_cari."%' OR kelas like '%".$kata_cari."%' ORDER BY id ASC";


    } else {

      $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode ORDER BY id ASC";

  }
      $result = mysqli_query($koneksi, $query);
            $jumlah_users = mysqli_num_rows($result);
      
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
      <td><?php echo $row['tgl_pinjam'];?></td>
      <td><?php echo $row['tgl_kembali']; ?></td>

      <td><img src="http://syntechid.42web.io/web/admin/img/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
            <td><?php echo $row['acc'];?></td>
      <td><button class="btn btn-primary text-white">Di <?php echo $row['status']; ?></button></td>
      <td>
              <a class="btn btn-outline-success" href="acc_alat.php?id=<?php echo $row['id']; ?>&nama=<?php echo $_SESSION['nama'];?>"><i class="bi bi-check2"></i></a> 
              <a class="btn btn-outline-danger" href="tolak.php?id=<?php echo $row['id']; ?>"><i class="bi bi-bookmark-x"></i></a>
          </td>
    </tr>
    <?php
        $no++; 
      }
      ?>
      <p>Jumlah Alat Pinjam : <b><?php echo $jumlah_users; ?></b></p>
  </tbody>
</table>


<!-- End Table -->
                                    </div>
                                </div>
                            </div>
<?php
include 'footer-admin.php';
?>