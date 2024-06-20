<?php
session_start();
include 'koneksi.php';

$query = "
    SELECT periksa.*, pasien.nama_pasien AS nama_pasien, dokter.nama AS nama_dokter, spesialis.spesialis AS nama_spesialis 
    FROM periksa  
    JOIN pasien ON periksa.id_pasien = pasien.id_pasien 
    JOIN dokter ON periksa.id_dokter = dokter.id_dokter 
    JOIN spesialis ON periksa.id_spesialis = spesialis.id_spesialis
";
$sql = mysqli_query($conn, $query);
$no = 0;

$_SESSION['name'];
$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!--font awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Data Pemeriksaan</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  <div class="container-fluid">
    <img src="LOGO_PUSKESMAS_SILIWANGI.png" class="navbar-brand tag" style="width: 60px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link ps me-4" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps me-4" href="periksa.php">Pemeriksaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps me-4" href="pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps me-4" href="dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps me-4" href="poli.php">Poliklinik</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn btn-logout" type="button" href="login.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- JUDUL-->
<div class="container">
    <h1 class="mt-4">DATA PEMERIKSAAN</h1>
    <figure>
        <center>
        <blockquote class="blockquote">
        <p>Data Pemeriksaan Pasien di Puskesmas</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            UPT Puskesmas Siliwangi <cite title="Source Title">Jl.Malioboro</cite>
        </figcaption>
        </center>
    </figure>
    <a href="kelola_periksa.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Tambah data
    </a>
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
            <thead>
                <tr>
                    <th><center>No.</center></th>
                    <th><center>Nama Pasien</center></th>
                    <th><center>Nama Dokter</center></th>
                    <th><center>Tujuan</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>Aksi</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($result = mysqli_fetch_assoc($sql)){ 
                ?>
                <tr>
                    <td><center><?php echo ++$no; ?>.</center></td>
                    <td><?php echo $result['nama_pasien']; ?></td>
                    <td><?php echo $result['nama_dokter']; ?></td>
                    <td><?php echo $result['nama_spesialis']; ?></td>
                    <td><?php echo $result['tanggal']; ?></td>
                    <td><center>
                        <a href="kelola_periksa.php?ubah=<?php echo $result['id_periksa']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="p_periksa.php?hapus=<?php echo $result['id_periksa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin ingin menghapus data?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </center></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
