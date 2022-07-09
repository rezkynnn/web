<?php
include 'koneksi.php';
$id = $_GET['id'];
$acc = $_GET['nama'];
$data = mysqli_query($koneksi, "UPDATE tb_pinjam SET status='Terima', acc='$acc' WHERE id='$id'");
header("location:index.php");
?>