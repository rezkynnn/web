<?php 

session_start();
 
include 'koneksi.php';
 

$nim = addslashes($_POST['nim']);
$password = md5($_POST['password']);

 

$sql = mysqli_query($con,"SELECT * FROM users WHERE nim='$nim' AND password='$password'");
$cek = mysqli_num_rows($sql);


if($cek > 0){
  $data = mysqli_fetch_assoc($sql);


  if($data['level']=="admin"){
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] =  $data['nama'];
    $_SESSION['level'] = "admin";

    header("location:admin/index.php");

  }else if($data['level']=="petugas"){

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nim'] = $data['nim'];
    $_SESSION['kelas'] = $data['kelas'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = "petugas";

    header("location:petugas/index.php");

  }else if($data['level']=="pengunjung"){

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nim'] = $data['nim'];
    $_SESSION['kelas'] = $data['kelas'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = "pengunjung";

    header("location:pengunjung/index.php");

  }else{

    header("location:login.php?alert=gagal");
  } 
}else{
  header("location:login.php?alert=gagal");
}
?>