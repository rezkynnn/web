<?php
function data_alat()
{
	include 'koneksi.php';
	$alat = mysqli_query($koneksi, "SELECT * FROM tools");
	$jumlah_barang = mysqli_num_rows($alat);

	echo $jumlah_barang;
}

function user()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM users");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function data()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam LEFT JOIN tools ON tb_pinjam.kode = tools.kode WHERE id_user='". $_SESSION['id_user'] ."' ORDER BY id ASC");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function terima()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status = 'Terima'");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function tolak()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status = 'Tolak'");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function pending()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status = 'Pending'");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function member()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

function barang_kembali()
{
	include 'koneksi.php';
	$user = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE st_brg = 'Kembali'");
	$jumlah_users = mysqli_num_rows($user);

	echo $jumlah_users;
}

 	?>