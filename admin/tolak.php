<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "UPDATE tb_pinjam SET status='Tolak' WHERE id='$id'");
header("location:index.php");
?>