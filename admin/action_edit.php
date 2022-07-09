<?php

include 'koneksi.php';
            $id_barang = $_POST['id_barang'];
            $kode = $_POST['kode'];
            $nama_barang = $_POST['nama_barang'];
            $stock = $_POST['stock'];
            $kondisi = $_POST['kondisi'];
            $lokasi = $_POST['lokasi'];
            $foto = $_FILES['foto']['name'];
             // var_dump($_POST);
             // die();

if ($foto != "") {
                $ekstensi_boleh = array('png','jpg');
                $x = explode('.', $foto);
                $ext = strtolower(end($x));
                $file_tmp = $_FILES['foto']['tmp_name'];
                $angka_acak = rand(1,999);
                $foto_baru = $angka_acak.'-'.$foto;
                if (in_array($ext, $ekstensi_boleh) === true) {
                    move_uploaded_file($file_tmp, 'img/' .$foto_baru);

                    $query = "UPDATE tools SET kode = '$kode', nama_barang = '$nama_barang', stock = '$stock', kondisi = '$kondisi', lokasi = '$lokasi', foto = '$foto_baru'";
                    $query .= "WHERE id_barang = '$id_barang'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";

                        }

              } else {

                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {


                    $query = "UPDATE tools SET kode = '$kode', nama_barang = '$nama_barang', stock = '$stock', kondisi = '$kondisi', lokasi = '$lokasi'";
                    $query .= "WHERE id_barang = '$id_barang'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {

        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }



