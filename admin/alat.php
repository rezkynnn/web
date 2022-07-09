<?php
include 'header-admin.php';
include 'koneksi.php';
?>
<div class="col-xl-9">
  <div class="card mb-4">
    <div class="card-header bg-danger text-white">
      <i class="bi bi-tools"></i>
       Kelolah Alat 
     </div>
     <div class="card-body">	
   		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-plus-circle"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-tools"></i> Tambah Tools</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="action.php" enctype="multipart/form-data">
        	<div class="mb-3">
        		<label for="kode" class="form-label">Kode Barang</label>
        		<input type="text" class="form-control" name="kode" id="kode" aria-describedby="kode" placeholder="Kode barang">
        		<div class="form-text" id="emailHelp">Contoh : P001</div>
        	</div>
        	<div class="mb-3">
        		<label for="nama" class="form-label">Nama barang</label>
        		<input type="text" name="nama_barang" id="nama" class="form-control" placeholder="Nama Barang">
        	</div>
        	<div class="mb-3">
        		<label for="stock" class="form-label">Jumlah Barang</label>
        		<input type="number" name="stock" id="stock" class="form-control" placeholder="Stok Barang">
        	</div>
        	<div class="mb-3">
        		<label for="kondisi" class="form-label">Kondisi Barang</label>
        		<select class="form-select" name="kondisi" id="kondisi">
        			<option value="">Pilih...</option>
        			<option value="Baru">Baru</option>
        			<option value="Bekas">Bekas</option>
        		</select>
        	</div>
          <div class="mb-3">
            <label class="form-label" for="lokasi">Lokasi Barang</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi">
          </div>
			    <div class="mb-3">
        		<label for="foto" class="form-label">Gambar Barang</label>
        		<input type="file" class="form-control" name="foto" required="" />
        	</div>
        	<button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<br>
<!-- Table -->
<table class="table table-hover table-striped">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Alat</th>
      <th scope="col">Nama Alat</th>
      <th scope="col">Jumlah Alat</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php

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
      <td><?php echo $row['kode']; ?></td>
      <td><?php echo $row['nama_barang']; ?></td>
      <td><?php echo $row['stock']; ?></td>
      <td><?php echo $row['kondisi']; ?></td>
      <td><?php echo $row['lokasi']; ?></td>
      <td><img src="img/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
      <td>
              <a class="btn btn-outline-dark" href="edit_alat.php?id=<?php echo $row['id_barang']; ?>"><i class="bi bi-pencil-square"></i></a> 
              <a class="btn btn-outline-danger" href="hapus_alat.php?id=<?php echo $row['id_barang']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-eraser-fill"></i></a>
          </td>
    </tr>
    <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
  </tbody>
</table>
<!-- End Table -->
     </div>
     </div>
     </div>

<?php
include 'footer-admin.php';
?>