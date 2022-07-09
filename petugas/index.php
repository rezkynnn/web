<?php
include 'header-petugas.php';
include 'koneksi.php';
?>
<div class="row">
                            <div class="col-xl-13">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-person-circle"></i>
                                        List Peminjam
                                    </div>
                                    <div class="card-body">
                                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="" method="GET">
                <div class="input-group">
                    <input class="form-control" type="text" name="kata_cari" placeholder="Cari Data..." aria-label="Cari Data..." aria-describedby="btnNavbarSearch" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
                    <button class="btn btn-primary" type="submit" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
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
      <th scope="col">Stock</th>
      <th scope="col">Status</th>
      <th scope="col">lokasi</th>
      <th scope="col">Foto</th>
      <th scope="col">Status Barang</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     if (isset($_GET['kata_cari'])) {
        $kata_cari = $_GET['kata_cari'];
        $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode WHERE nim like '%".$kata_cari."%' OR nama like '%".$kata_cari."%' OR kelas like '%".$kata_cari."%' ORDER BY id ASC";

    } else {

      $batas = 10;
      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;   

      $previous = $halaman - 1;
      $next = $halaman + 1; 

      $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      $jumlah_data = mysqli_num_rows($result);
      $total_halaman = ceil($jumlah_data / $batas);

      $data_barang = mysqli_query($koneksi,"SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode LIMIT $halaman_awal, $batas");
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
  }

      //buat perulangan untuk element tabel dari data 
      $no = $halaman_awal+1; //variabel untuk membuat nomor urut

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
      <td><button class="btn btn-dark"><?php echo $row['status']; ?></button></td>
      <td><?php echo $row['lokasi']; ?></td>
      <td><img src="../admin/img/<?php echo $row['foto']; ?>" style="width: 60px;"></td>
      <td><button class="btn btn-info"><?php echo $row['st_brg']; ?></button></td>
      <td>
              <a class="btn btn-outline-success" href="edit_alat.php?id=<?php echo $row['id']; ?>&nama=<?php echo $_SESSION['nama'];?>"><i class="bi bi-check2"></i></a> 
              <a class="btn btn-outline-danger" href="tolak.php?id=<?php echo $row['id']; ?>"><i class="bi bi-bookmark-x"></i></a>
              <a class="btn btn-outline-primary" href="barang.php?id=<?php echo $row['id']; ?>"><i class="bi bi-archive"></i></a>

          </td>
    </tr>
    <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
  </tbody>
</table>
<nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>


<!-- End Table -->
                                    </div>
                                </div>
                            </div>
<?php
include 'footer-petugas.php';
?>