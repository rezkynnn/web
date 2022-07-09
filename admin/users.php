<?php
include 'header-admin.php';
include 'koneksi.php';
?>

  <div class="row">
    <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        List User
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
                                    <h5 class="modal-title" id="exampleModalLabel">Input User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="" role="form">
                                      <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="nama" id="nama" required="required">
                                      </div>
                                      <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
                                      </div>
                                      <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
                                      </div>
                                      <div class="mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        <select name="level" id="level" class="form-select">
                                          <option value="">Pilih..</option>
                                          <option value="admin">Admin</option>
                                          <option value="petugas">Petugas</option>
                                          <option value="pengunjung">User</option>
                                        </select>
                                      </div>
                                      <button type="submit" name="submit" class="btn btn-primary" value="simpan">Simpan Data</button> 
                                    </form>
                                    <?php
        include('koneksi.php');
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $nama = $_POST['nama'];
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          $level = $_POST['level'];

          //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "INSERT INTO users (nama,username,password,level)VALUES('$nama', '$username', '$password', '$level')") or die(mysqli_error($koneksi));
          //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          echo "<script>alert('data berhasil disimpan.');window.location='users.php';</script>";
        }
        ?>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->

  <!-- Table -->
  <table class="table table-hover mt-3 table-striped">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Level</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM users ORDER BY id_user ASC";
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
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['level']; ?></td>
       <td><a target="_blank" class="btn btn-outline-dark" href="details-user.php?id=<?php echo $row['id_user']; ?>"><i class="bi bi-pencil-square"></i></a>  <a class="btn btn-outline-danger" href="hapus-user.php?id=<?php echo $row['id_user']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-eraser-fill"></i></a></td>
    </tr>
     <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
  </tbody>
</table>
<p>Jumlah User : <b><?php echo user(); ?></b></p>
  <!-- End Table -->
</div>

<?php
include 'footer-admin.php';
?>
