<?php

include 'koneksi.php';
if(isset($_POST['aksi'])){
  if($_POST['aksi'] == "add"){

      $nik = $_POST['nik'];
      $nama_pasien = $_POST['nama_pasien'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $alamat = $_POST['alamat'];
      $id_spesialis = $_POST['id_spesialis'];

      $query ="INSERT INTO pasien VALUES(null, '$nik', '$nama_pasien', '$jenis_kelamin', '$alamat', '$id_spesialis')";
      $sql = mysqli_query($conn, $query);

      if($sql){
          header("location: pasien.php");
      } else {
          echo $query;
      }
  } else if($_POST['aksi'] =="edit"){

      $id_pasien = $_POST['id_pasien'];
      $nik = $_POST['nik'];
      $nama_pasien = $_POST['nama_pasien'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $alamat = $_POST['alamat'];
      $id_spesialis = $_POST['id_spesialis'];

      $query = "UPDATE pasien SET nik='$nik', nama_pasien= '$nama_pasien', jenis_kelamin= '$jenis_kelamin', alamat='$alamat', id_spesialis='$id_spesialis' WHERE id_pasien='$id_pasien';";
      $sql = mysqli_query($conn, $query); 
      header("location: pasien.php");
  }
} 

if(isset($_GET['hapus'])){
  $id_pasien = $_GET['hapus'];
  $query = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";
  $sql = mysqli_query($conn, $query);

  if($sql){
      header("location: pasien.php");
  } else {
      echo $query;
  }
}
?>
