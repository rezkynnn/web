<?php
include 'koneksi.php';
$id = $_GET['id'];
$acc = $_GET['nama'];
$data = mysqli_query($koneksi, "UPDATE tb_pinjam SET st_brg='Kembali', acc='$acc' WHERE id='$id'");
header("location:index.php");
?>