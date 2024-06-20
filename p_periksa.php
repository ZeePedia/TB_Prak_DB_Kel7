<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $id_pasien = $_POST['id_pasien'];
        $id_dokter = $_POST['id_dokter'];
        $id_spesialis = $_POST['id_spesialis'];
        $tanggal = $_POST['tanggal'];

        $query = "INSERT INTO periksa (id_pasien, id_dokter, id_spesialis, tanggal) 
                  VALUES ('$id_pasien', '$id_dokter', '$id_spesialis', '$tanggal')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("Location: periksa.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } elseif ($_POST['aksi'] == "edit") {
        $id_periksa = $_POST['id_periksa'];
        $id_pasien = $_POST['id_pasien'];
        $id_dokter = $_POST['id_dokter'];
        $id_spesialis = $_POST['id_spesialis'];
        $tanggal = $_POST['tanggal'];

        $query = "UPDATE periksa SET id_pasien='$id_pasien', id_dokter='$id_dokter', id_spesialis='$id_spesialis', tanggal='$tanggal' WHERE id_periksa='$id_periksa'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: periksa.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['hapus'])) {
    $id_periksa = $_GET['hapus'];
    $query = "DELETE FROM periksa WHERE id_periksa='$id_periksa'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("Location: periksa.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
