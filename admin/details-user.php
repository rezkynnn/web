<?php
include 'koneksi.php';
include 'header-admin.php';

if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM users WHERE id_user='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='user.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='user.php';</script>";
  }         
  ?>
<div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Detail User
                                    </div>
                                    <div class="card-body">
                                    	<form method="POST" action="" role="form">
    <section class="base">
    <input name="id" value="<?php echo $data['id_user']; ?>"  hidden />
    <div class="mb-3">
  <label for="nama" class="form-label">Nama Petugas</label>
  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>">
</div>
<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $data['username']; ?>">
</div>
<div class="mb-3">
  <label for="password" class="form-label">password</label>
  <input type="password" name="password" class="form-control" placeholder="password">
</div>
<div class="mb-3">
  <label for="level" class="form-label">Level Petugas</label>
            <select name="level" class="form-select" id="level" required>
              <option value="<?php echo $data['level'];?>"><?php echo $data['level'];?></option>
              <option value="admin">admin</option>
              <option value="users">users</option>
              </select>
</div>
    </section>
    <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
  </form>
</div>
  <?php

        //jika klik tombol submit maka akan melakukan perubahan
        if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $nama = $_POST['nama'];
          $username = $_POST['username'];
          $password = md5($_POST['password']);  
          $level = $_POST['level'];

          //query mengubah 
          mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user ='$id'") or DIE(mysqli_error($koneksi));

          //redirect ke halaman index.php
          echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
        }



        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
include 'footer-admin.php';
?>