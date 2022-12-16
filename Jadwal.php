<?php
include "function.php";
session_start();
if(isset($_SESSION['login'])){
$id=$_SESSION['UID'];
$row= query("SELECT * FROM tb_user WHERE id = $id")[0];    
}
if(!isset($_SERVER["PATH_INFO"])=="jadwal.php"){
 header("location: jadwal");
 exit;
}
$senin="senin";
$jadwal_query_senin=query("SELECT * FROM tb_jadwal WHERE hari='$senin'");
$selasa="selasa";
$jadwal_query_selasa=query("SELECT * FROM tb_jadwal WHERE hari='$selasa'");
$rabu="rabu";
$jadwal_query_rabu=query("SELECT * FROM tb_jadwal WHERE hari='$rabu'");
$kamis="kamis";
$jadwal_query_kamis=query("SELECT * FROM tb_jadwal WHERE hari='$kamis'");
$jumat="jumat";
$jadwal_query_jumat=query("SELECT * FROM tb_jadwal WHERE hari='$jumat'");
$sabtu="sabtu";
$jadwal_query_sabtu=query("SELECT * FROM tb_jadwal WHERE hari='$sabtu'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css" />
    <style>
    .navbar-fixed-top{
      position: sticky;
      position: -webkit-sticky;
      top: 0;
      z-index: 1;
    }
    </style>
    <title>XII TKJ |HOME PAGE</title>
  </head>
  <body>
    <section class="home content">
      <header class="bg-dark">
        <div class="container d-flex">
          <div class="row">
            <img src="images/logo.png" alt="logo" />
          </div>
          <div class="row text-white mt-auto mb-auto ms-4">
            <p class="a">XII TKJ</p>
            <p class="b">SMK XAVERIUS PALEMBANG</p>
          </div>
        </div>
      </header>
         <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="profile.php">Jadwal Page</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link " href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="profile.php">Profile Siswa</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link active" href="Jadwal.php">Jadwal</a>
              </li>
             
              <?php
                $status=isset($_SESSION['login']) === true;
              if(!$status):
              ?>
               <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary" href="login.php">Login</a>
              </li>
              <?php
              endif;
              ?>
              <!--
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary" href="login.php">Login</a>
              </li>
              -->
              <?php
             
              if($status):
              ?>
               <li class="nav-item">
                <a class="nav-link" href="article.php">article</a>
              </li>
              <?php
              $lvl=$_SESSION["level"] == 'admin';
              if($lvl):
              ?>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Dashboard-Admin
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="dashboard-user.php"
                      >Dashboard User</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="dashboard-banner.php"
                      >Dashboard Banner</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="dashboard-article.php"
                      >Dashboard Article</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="dashboard-jadwal.php"
                      >Dashboard Jadwal</a
                    >
                  </li>
                </ul>
              </li>
             <?php
             endif;
             ?>
              <li class="d-flex">
                <div
                  class="profile"
                  style="
                    background-image: url('foto/<?= $row["gambar"];?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                    border-radius: 50%;
                    background-position: center;
                    width: 40px;
                    height: 40px;
                  "
                ></div>
                <p class="mt-auto mb-auto ms-2"><?= $row["namalengkap"];?></p>
                <a
                  href="setting.php"
                  class="text-secondary d-flex mt-auto mb-auto ms-1"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    fill="currentColor"
                    class="bi bi-gear-fill mt-auto mb-auto ms-2"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"
                    />
                  </svg>
                  <div class="d-block ms-1 d-lg-none">
                    setting
                  </div>
                </a>
                <div class="mt-auto mb-auto ms-2" >
                <a href="logout.php" class="d-flex text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left " viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg>
                   <div class="d-block ms-1 d-lg-none">
                    logout
                  </div>
                </a>
                </div>
              </li>
              <?php
              endif;
              ?>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row mt-3 mb-5">
          <!-- senin -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">senin</td>
              </tr>
              <?php
              foreach($jadwal_query_senin as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php
             
              endforeach;
              ?>
            </tbody>
          </table>
          <!-- selasa -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">Selasa</td>
              </tr>
              <?php
               foreach($jadwal_query_selasa as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php              
              endforeach;
              ?>
            </tbody>
          </table>
          <!-- rabu -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">Rabu</td>
              </tr>
             <?php
               foreach($jadwal_query_rabu as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php              
              endforeach;
              ?>
            </tbody>
          </table>
          <!-- kamis -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">Kamis</td>
              </tr>
              <?php
               foreach($jadwal_query_kamis as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php              
              endforeach;
              ?>
            </tbody>
          </table>
          <!-- jumat -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">Jumat</td>
              </tr>
              <?php
               foreach($jadwal_query_jumat as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php              
              endforeach;
              ?>
            </tbody>
          </table>
          <!-- sabtu -->
          <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Maple</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="10">Sabtu</td>
              </tr>
              <?php
               foreach($jadwal_query_sabtu as $row) :
              ?>
              <tr>
                <td><?= $row["jamke"];?></td>
                <td><?= $row["nama_maple"];?></td>
              </tr>
              <?php              
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <footer class="mb-auto bg-dark pt-3 pb-3">
      <p class="text-center text-white">copyright &copy; | SMKTKJXAV</p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
