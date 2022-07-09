<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style type="text/css">
      .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>

    <title>Halaman Login</title>
  </head>
  <body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-6 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="img/pnup.png"
                    style="width: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Politeknik Negeri Ujung Pandang</h4>
                </div>

                <form method="POST" action="" role="form">
                  <p>Silahkan Login</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                  </div>

                  <div class="form-outline mb-4">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan Nomor Induk Mahasiswa">
                  </div>

                  <div class="form-outline mb-4">
                    <label for="Kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="Kelas" placeholder="Masukkan Kelas">
                  </div>

 
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email</label>
                    <input type="text" name="username" id="form2Example11" class="form-control"
                      placeholder="Masukkan Email" />
                  </div> 

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" name="password" placeholder="Password" id="form2Example22" class="form-control" />
                  </div>
                  <input type="hidden" name="level" value="pengunjung">

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block w-100 gradient-custom-2 mb-3" type="submit" value="simpan" name="submit">Register</button>
                    <a class="text-muted" href="#">Lupa Password</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Tidak Punya Akun?</p>
                    <button type="button" class="btn btn-outline-danger">Buat Baru</button>
                  </div>
                </form>
                <?php
        include('kon.php');
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $nama = $_POST['nama'];
          $nim = $_POST['nim'];
          $kelas = $_POST['kelas'];
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          $level = $_POST['level'];

          //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "INSERT INTO users (nama,nim,kelas,username,password,level)VALUES('$nama', '$nim', '$kelas', '$username', '$password', '$level')") or die(mysqli_error($koneksi));
          //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          echo "<script>alert('Registrasi berhasil silahkan login.');window.location='login.php';</script>";
        }
        ?>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Politeknik Negeri Ujung Pandang</h4>
                <p class="small mb-0">Politeknik Negeri Ujung Pandang atau biasa disingkat PNUP adalah sebuah perguruan tinggi negeri vokasi yang terdapat di Kota Makassar, Sulawesi Selatan, Indonesia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>