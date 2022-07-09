<?php
include 'header-pengunjung.php';
include 'koneksi.php';
?>
    <div class="row">
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        List Barang Pinjaman
                                    </div>
                                    <div class="card-body">
                                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-plus-circle"></i> 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" role="form">
           <table class="table">
            <div class="mb-3">
              <div class="row">
  <div class="col">
    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam">
  </div>
  <div class="col">
    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
    <input type="date" class="form-control" name="tgl_kembali" id="tgl_pinjam">
  </div>
</div>
            </div>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Stock</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM tools ORDER BY id_barang ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data 
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $row['nama_barang']; ?></td>
      <td><input class="form-control" type="number" name="stock" value="<?php echo $row['stock']; ?>"></td>
      <td><?php echo $row['kondisi']; ?></td>
      <td>
        <img src="../admin/img/<?php echo $row['foto']; ?>" style="width: 60px;">
        <td>
    <div class="form-check">
  <input class="form-check-input" name="kode" type="checkbox" value="<?php echo $row['kode']; ?>" id="flexCheckDefault">
        </div>
      </td>
    </tr>
    <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
      <input type="hidden" name="nama" value="<?php echo $_SESSION['nama']; ?>">
      <input type="hidden" name="nim" value="<?php echo $_SESSION['nim']; ?>">
      <input type="hidden" name="kelas" value="<?php echo $_SESSION['kelas']; ?>">
      <input type="hidden" name="nama_barang" value="<?php echo $row['nama_barang']; ?>">
      <input type="hidden" name="foto"  value="<?php echo $row['foto']; ?>">
      <input type="hidden" name="status" value="Pending">
  </tbody>
</table>
<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </form>
        <?php
        include('koneksi.php');
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $tgl_pinjam = $_POST['tgl_pinjam'];
          $tgl_kembali = $_POST['tgl_kembali'];
          $id_user = $_POST['id_user'];
          $nama = $_SESSION['nama'];
          $nim = $_SESSION['nim'];
          $kelas = $_SESSION['kelas'];
          $nama_barang = $_POST['nama_barang'];
          $stock = $_POST['stock'];
          $kondisi = $_POST['kondisi'];
          $foto = $_POST['foto'];
          $status = $_POST['status'];
          $kode = $_POST['kode'];


          //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "INSERT INTO tb_pinjam (tgl_pinjam,tgl_kembali,id_user,nama,nim,kelas,nama_barang,stock,kondisi,foto,status,kode)VALUES('$tgl_pinjam', '$tgl_kembali', '$id_user', '$nama', '$nim', '$kelas', '$nama_barang', '$stock', '$kondisi', '$foto', '$status', '$kode')") or die(mysqli_error($koneksi));
          //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          echo "<script>alert('data berhasil disimpan.');window.location='form.php';</script>";
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<table class="table table-hover table-striped container">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Alat</th>
      <th scope="col">Nama Alat</th>
      <th scope="col">Stock Alat</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Foto</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

      $query = "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode WHERE id_user='". $_SESSION['id_user'] ."' ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data 
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {

      ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $row['kode']; ?></td>
      <td><?php echo $row['nama_barang']; ?></td>
      <td><?php echo $row['stock_pinjam']; ?></td>
      <td><?php echo $row['kondisi']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><img src="../admin/img/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
      <td>
              <a class="btn btn-outline-dark" href="edit_alat.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a> 
              <a class="btn btn-outline-danger" href="hapus_alat.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-eraser-fill"></i></a>
          </td>
    </tr>
    <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
  </tbody>
</table>
<p>Jumlah Alat : <b><?php echo data_alat(); ?></b></p>
<!-- End Table -->



                                    </div>

                                </div>
                            </div>
                          </div>

<?php
include 'footer-pengunjung.php';
?>