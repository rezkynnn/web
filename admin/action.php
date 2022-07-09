<?php

include 'koneksi.php';

            $kode = $_POST['kode'];
            $nama_barang = $_POST['nama_barang'];
            $stock = $_POST['stock'];
            $kondisi = $_POST['kondisi'];
            $lokasi = $_POST['lokasi'];
            $foto = $_FILES['foto']['name'];

if ($foto != "") {
                $ekstensi_boleh = array('png','jpg');
                $x = explode('.', $foto);
                $ext = strtolower(end($x));
                $file_tmp = $_FILES['foto']['tmp_name'];
                $angka_acak = rand(1,999);
                $foto_baru = $angka_acak.'-'.$foto;
                if (in_array($ext, $ekstensi_boleh) === true) {
                    move_uploaded_file($file_tmp, 'img/' .$foto_baru);

$query = "INSERT INTO tools (kode, nama_barang, stock, kondisi, lokasi, foto)  VALUES ('$kode', '$nama_barang', '$stock', '$kondisi', '$lokasi', '$foto_baru')";
                    $result = mysqli_query($koneksi, $query);
                    // Cek query
                    if (!$result) {
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));

                    } else {

                        echo "<script>alert('Data berhasil ditambah.');window.location='alat.php';</script>";
                    }

                } else {
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='alat.php';</script>";
                }

            } else {
                $query = "INSERT INTO tools (kode, nama_barang, stock, kondisi, lokasi, foto)  VALUES ('$kode', '$nama_barang', '$stock', '$kondisi', '$lokasi' null)";
                 $result = mysqli_query($koneksi, $query);

                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));

                      } else {
                        echo "<script>alert('Data berhasil ditambah.');window.location='alat.php';</script>";
            }   
        }