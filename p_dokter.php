<?php

    include 'koneksi.php';
   if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add"){

        $nama = $_POST['nama'];
        $no_telepon = $_POST['no_telepon'];
        $id_spesialis = $_POST['id_spesialis'];
    
        $query ="INSERT INTO dokter VALUES(null, '$nama', '$no_telepon', '$id_spesialis')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: dokter.php");
            //echo "Data berhasil di tambahkan <a href='index.php'>[Home] </a>";
        } else {
            echo $query;
        }

        //echo "<br>Tambah Data <a href='index.php'>[Home] </a>";
    } else if($_POST['aksi'] =="edit"){
        //echo "Edit Data <a href='index.php'>[Home] </a>";

        $id_dokter = $_POST['id_dokter'];
        $nama = $_POST['nama'];
        $no_telepon = $_POST['no_telepon'];
        $id_spesialis = $_POST['id_spesialis'];


        $query = "UPDATE dokter SET nama='$nama', no_telepon= '$no_telepon', id_spesialis= '$id_spesialis' WHERE id_dokter='$id_dokter';";
        $sql = mysqli_query($conn, $query); 
        header("location: dokter.php");
    }
   } 

   if(isset($_GET['hapus'])){
    $id_dokter = $_GET['hapus'];
    $query = "DELETE FROM dokter WHERE id_dokter = '$id_dokter'";
    $sql = mysqli_query($conn, $query);
    //echo "Hapus Data <a href='index.php'>[Home] </a>";

    if($sql){
        header("location: dokter.php");
        //echo "Data berhasil di tambahkan <a href='index.php'>[Home] </a>";
    } else {
        echo $query;
    }
   }

?>
