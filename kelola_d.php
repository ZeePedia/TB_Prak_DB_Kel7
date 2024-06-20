<!DOCTYPE html>
<?php 
  include 'koneksi.php';
  
  $id_dokter = '';
  $nama = '';
  $no_telepon = '';
  $id_spesialis = '';

  if(isset($_GET['ubah'])){
    $id_dokter = $_GET['ubah'];

    $query = "SELECT * FROM dokter WHERE id_dokter='$id_dokter';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $no_telepon = $result['no_telepon'];
    $id_spesialis = $result['id_spesialis'];
  }

  $querySpesialis = "SELECT * FROM spesialis";
  $sqlSpesialis = mysqli_query($conn, $querySpesialis);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <!--fort awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    
    <title>Tambah Data Dokter</title>
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
    <div class="container">
      <br>
      <form method="POST" action="p_dokter.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_dokter ;?>" name="id_dokter">
        <div class="mb-3 row">

            <div class="mb-3 row">
              <label for="nama" class="col-sm-2 col-form-label">
                  Nama Dokter
              </label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Ex : Kamado Tanjiro" value = "<?php echo $nama; ?>" >
              </div>
            </div>

            <div class="mb-3 row">
              <label for="no_telepon" class="col-sm-2 col-form-label">
                  No Telepon
              </label>
              <div class="col-sm-10">
                  <input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="Ex : 083130485667" value = "<?php echo $no_telepon; ?>" >
              </div>
            </div>

            <div class="mb-3 row">
              <label for="spesialis" class="col-sm-2 col-form-label">
                  Spesialis
              </label>
              <div class="col-sm-10">
                <select name="id_spesialis" class="form-control" id="id_spesialis">
                  <?php while($rowSpesialis = mysqli_fetch_assoc($sqlSpesialis)) { ?>
                    <option value="<?php echo $rowSpesialis['id_spesialis']; ?>" <?php if($rowSpesialis['id_spesialis'] == $id_spesialis) echo 'selected'; ?>>
                      <?php echo $rowSpesialis['spesialis']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="mb-3 row mt-4">
              <div class="col">
                <?php
                  if(isset($_GET['ubah'])){
                ?>
                  <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Simpan Perubahan
                  </button>
                <?php
                  }else{
                ?>
                  <button type="submit" name="aksi" value="add" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Tambahkan
                  </button>
                <?php
                  }
                ?>  
                  <a href="dokter.php" type="button" class="btn btn-danger">
                      <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                      Batal
                  </a>
              </div>
        </div>
      </form>      
    </div>

</body>
</html>
