
<!DOCTYPE html>
<?php 
  include 'koneksi.php';
  
  $id_pasien = '';
  $nik = '';
  $nama_pasien = '';
  $jenis_kelamin = '';
  $alamat = '';
  $id_spesialis = '';

  if(isset($_GET['ubah'])){
    $id_pasien = $_GET['ubah'];

    $query = "SELECT * FROM pasien WHERE id_pasien='$id_pasien';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nik = $result['nik'];
    $nama_pasien = $result['nama_pasien'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];
    $id_spesialis = $result['id_spesialis'];
  }

  $spesialis_query = "SELECT * FROM spesialis";
  $spesialis_sql = mysqli_query($conn, $spesialis_query);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <script src="js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="style.css">
    <!--fort awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    
    <title>Tambah Data Pasien</title>
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
      <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_pasien ;?>" name="id_pasien">
        <div class="mb-3 row">
              <label for="nik" class="col-sm-2 col-form-label">
                  NIK
              </label>
              <div class="col-sm-10">
                <input type="text" name="nik" class="form-control" id="nik" placeholder="Ex : 3205050506030003" value = "<?php echo $nik; ?>" >
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nama_pasien" class="col-sm-2 col-form-label">
                  Nama Pasien
              </label>
              <div class="col-sm-10">
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" placeholder="Ex : Kamado Tanjiro" value = "<?php echo $nama_pasien; ?>" >
              </div>
            </div>

            <div class="mb-3 row">
              <label for="jk" class="col-sm-2 col-form-label">
                  Jenis Kelamin
              </label>
              <div class="col-sm-10">
                  <select id="jk" name="jenis_kelamin" class="form-select" >
                      
                      <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";}?> value="Laki-laki">Laki-laki</option>
                      <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";}?> value="Perempuan">Perempuan</option>
                    </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="alamat" class="col-sm-2 col-form-label">
                  Alamat Lengkap
              </label>
              <div class="col-sm-10">
                  <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="specialization" class="col-sm-2 col-form-label">
                  Tujuan
              </label>
              <div class="col-sm-10">
                  <select id="specialization" name="id_spesialis" class="form-select">
                    <?php while($specialization = mysqli_fetch_assoc($spesialis_sql)) { ?>
                      <option value="<?php echo $specialization['id_spesialis']; ?>" <?php if($id_spesialis == $specialization['id_spesialis']) echo 'selected'; ?>>
                        <?php echo $specialization['spesialis']; ?>
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
                  <button  type="sumbit" name="aksi" value="add" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Tambahkan
                  </button>
                <?php
                  }
                ?>  
                  <a href="pasien.php" type="button" class="btn btn-danger">
                      <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                      Batal
                  </a>
              </div>
        </div>
      </form>      
    </div>

</body>
</html>