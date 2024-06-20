<!DOCTYPE html>
<?php 
include 'koneksi.php';

$id_periksa = '';
$id_pasien = '';
$id_dokter = '';
$id_spesialis = '';
$tanggal = '';

if (isset($_GET['ubah'])) {
    $id_periksa = $_GET['ubah'];
    $query = "SELECT * FROM periksa WHERE id_periksa='$id_periksa';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $id_pasien = $result['id_pasien'];
    $id_dokter = $result['id_dokter'];
    $id_spesialis = $result['id_spesialis'];
    $tanggal = $result['tanggal'];
}

// Fetch data pasien
$query_pasien = "SELECT id_pasien, nama_pasien FROM pasien";
$sql_pasien = mysqli_query($conn, $query_pasien);

$query_dokter = "SELECT id_dokter, nama FROM dokter";
$sql_dokter = mysqli_query($conn, $query_dokter);

$query_spesialis = "SELECT id_spesialis, spesialis FROM spesialis";
$sql_spesialis = mysqli_query($conn, $query_spesialis);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Tambah Data Kunjungan</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  <div class="container-fluid">
    <img src="LOGO_PUSKESMAS_SILIWANGI.png" class="navbar-brand" style="width: 60px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link ps me-4" href="index.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link ps me-4" href="periksa.php">Pemeriksaan</a></li>
        <li class="nav-item"><a class="nav-link ps me-4" href="pasien.php">Pasien</a></li>
        <li class="nav-item"><a class="nav-link ps me-4" href="dokter.php">Dokter</a></li>
        <li class="nav-item"><a class="nav-link ps me-4" href="poli.php">Poliklinik</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link btn btn-logout" href="login.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <br>
    <form method="POST" action="p_periksa.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_periksa; ?>" name="id_periksa">
        
        <div class="mb-3 row">
            <label for="id_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_pasien" id="id_pasien" required>
                    <?php while ($row_pasien = mysqli_fetch_assoc($sql_pasien)) { ?>
                        <option value="<?php echo $row_pasien['id_pasien']; ?>" <?php if ($id_pasien == $row_pasien['id_pasien']) echo 'selected'; ?>>
                            <?php echo $row_pasien['nama_pasien']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="id_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_dokter" id="id_dokter" required>
                    <?php while ($row_dokter = mysqli_fetch_assoc($sql_dokter)) { ?>
                        <option value="<?php echo $row_dokter['id_dokter']; ?>" <?php if ($id_dokter == $row_dokter['id_dokter']) echo 'selected'; ?>>
                            <?php echo $row_dokter['nama']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="id_spesialis" class="col-sm-2 col-form-label">Spesialis</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_spesialis" id="id_spesialis" required>
                    <?php while ($row_spesialis = mysqli_fetch_assoc($sql_spesialis)) { ?>
                        <option value="<?php echo $row_spesialis['id_spesialis']; ?>" <?php if ($id_spesialis == $row_spesialis['id_spesialis']) echo 'selected'; ?>>
                            <?php echo $row_spesialis['spesialis']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input required type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal; ?>">
            </div>
        </div>

        <div class="mb-3 row mt-4">
            <div class="col">
                <button type="submit" name="aksi" value="<?php echo isset($_GET['ubah']) ? 'edit' : 'add'; ?>" class="btn btn-primary">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan
                </button>
                <a href="periksa.php" class="btn btn-danger">
                    <i class="fa fa-reply" aria-hidden="true"></i> Batal
                </a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
