<?php
include 'koneksi.php';

 if (isset($_GET['id'])) {
 	
 	$id = $_GET['id'];

 	// query

 	$query = "SELECT * FROM tools WHERE id_barang='$id'";
 	$result = mysqli_query($koneksi, $query);

   if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));


 	}

 	$data = mysqli_fetch_assoc($result);

 	if (!count($data)) {
 		 echo "<script>alert('Data tidak ditemukan pada database');window.location='alat.php';</script>";
       }
  } else {
    
    echo "<script>alert('Masukkan data id.');window.location='alat.php';</script>";
  }         
  ?>
  <?php
  include 'header-admin.php';
  ?>
<div class="col-xl-9">
  <div class="card mb-4">
    <div class="card-header bg-danger text-white">
      <i class="bi bi-tools"></i>
       Kelolah Alat
     </div>
     <div class="card-body">	
     		<form method="POST" action="action_edit.php" enctype="multipart/form-data">
     			<input type="hidden" name="id_barang" value="<?php echo $data['id_barang'];?> ">
     			<div class="mb-3">
     				<label for="kode" class="form-label">Kode Alat</label>
     				<input type="text" name="kode" class="form-control" value="<?php echo $data['kode']; ?>">
     			</div>
     			<div class="mb-3">
     				<label for="nama" class="form-label">Nama Alat</label>
     				<input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>">
     			</div>
     			<div class="mb-3">
     				<label for="stock" class="form-label">Stock Alat</label>
     				<input type="text" name="stock" class="form-control" value="<?php echo $data['stock'];?>">
     			</div>
     			<div class="mb-3">
     				<label for="kondisi" class="form-label">Kondisi Alat</label>
     				<input type="text" name="kondisi" class="form-control" value="<?php echo $data['kondisi'];?>">
     			</div>
          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi ALat</label>
            <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>">
          </div>
     			<div class="mb-3">
     				<label class="form-label" for="foto">Foto</label>
     				<br>
     				<img style="width: 120px;float: left;margin-bottom: 5px;" src="img/<?php echo $data['foto']; ?>">
     				<br>
     				<input type="file" name="foto" class="form-control" value="<?php echo $data['foto'];?> ">
     			</div>
     			<button class="btn btn-primary" type="submit">Update</button>
     		</form>
     </div>
 </div>
</div>
<?php
include 'footer-admin.php';
?>