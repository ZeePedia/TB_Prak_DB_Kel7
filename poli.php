<?php
session_start();
include_once('koneksi.php');

// if(isset($_SESSION['name']) && isset($_SESSION['username'] )){

// }
$_SESSION['name'];
$_SESSION['username'];
?>
<!doctype html>
<html lang="en">

<head>
  <title>Welcome Form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="css/bootstrap.min.css" rel="stylesheet" >
    <script src="js/bootstrap.bundle.min.js" ></script>

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  <div class="container-fluid">
    <img src="LOGO_PUSKESMAS_SILIWANGI.png" class="navbar-brand tag" style="width: 60px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link ds me-4" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pr me-4" href="periksa.php">Pemeriksaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps me-4" href="pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link dr me-4" href="dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pl me-4" href="poli.php">Poliklinik</a>
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

<div class="container-fluid">
    <br>
    <div class="row mt-5" >
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">UMUM</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-hospital-o fa-3x text-black"></i>
                        </div>
                 </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">UGD</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-ambulance fa-3x text-black"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">BP-GIGI</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-medkit fa-3x text-black"></i>>
                        </div>
                 </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                       
                        <div class="h5 mb-0 font-weight-bold text-gray-800 mt-2">BERSALIN</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-child fa-3x text-black"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">KEJIWAAN</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-heartbeat fa-3x text-black"></i>
                        </div>
                 </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">LABORATORIUM</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-flask fa-3x text-black"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">KESEHATAN LANSIA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-wheelchair fa-3x text-black"></i>
                        </div>
                 </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                           
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">GIZI</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cutlery fa-3x text-black"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

    
</div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
