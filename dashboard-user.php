<?php
include "function.php";
if(!isset($_SERVER["PATH_INFO"])=="dashboard-user.php"){
 header("location: dashboard-user");
 exit;
}
session_start();

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
$leveluser = $_SESSION['level'] == 'admin';
if(!$leveluser){
        header("location: index.php");
        exit;
}
$ids=$_SESSION['UID'];
$rows= mysqli_query($conn,"SELECT * FROM tb_user WHERE id = '$ids'");
$query_user=mysqli_fetch_assoc($rows);

  $jumlahDataPerHalaman = 6;
  $jumlahData =count(query("SELECT * FROM tb_user"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanaktif = (isset($_GET["halaman"] )) ? $_GET["halaman"] : 1 ;  
//halaman = 2, awal data = 4
//halaman = 3, awal data = 4
$awalData = ($jumlahDataPerHalaman * $halamanaktif) - $jumlahDataPerHalaman;
//data siswa
    $data = query("SELECT * FROM tb_user LIMIT $awalData,$jumlahDataPerHalaman");
if( isset($_POST["cari"] )) {
    $data = cariuser($_POST['keyword_user']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>XII TKJ | dashboard user</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css" />
    <style>
      .navbar-fixed-top.scrolled::after {
        content: "";
        height: 100%;
        width: 100%;
        z-index: -2;
        background-image: url("images/dark\ 12.jpg");
        background-position: center;
        background-size: cover;
        position: absolute;
        opacity: 0.7;
      }

      .dashboard-home .content .card-glass::after {
        content: "";
        height: 100%;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
          rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
          rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        border-radius: 20px;
        background-image: url("images/dark\ 12.jpg");
        background-position: center;
        background-size: cover;
        position: absolute;
        opacity: 0.3;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
      }
      .dashboard .sidebar .navbarside::after {
        content: "";
        z-index: -2;
        height: 100%;
        width: 100%;

        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
          rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
          rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        border-radius: 20px;
        background-image: url("images/dark\ 12.jpg");
        background-position: center;
        background-size: cover;
        position: absolute;
        opacity: 0.3;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
      }
      .dashboard .navbar::after {
        content: "";
        height: 100%;
        width: 100%;
        z-index: -2;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
          rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
          rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        border-radius: 20px;
        background-image: url("images/dark\ 12.jpg");
        background-position: center;
        background-size: cover;
        position: absolute;
        opacity: 0.3;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
      }
    </style>
  </head>
  <body class="bg-dark">
    <section class="dashboard dashboard-user">
      <div class="d-flex">
        <div
          class="sidebar navbar-expand col-lg-2 m-3 fixed-xl-top"
          style="transition: 1s all"
          id="navbarScroll"
        >
          <div class="navbarside p-4" style="height: 95vh">
            <div class="container">
              <div class="logo me-auto ms-auto mt-lg-2 mt-5">
                <img src="images/admin.png" alt="" class="w-75" />
              </div>
            </div>
            <div class="menu">
              <ul class="text-white link">
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard.php" class="nav-link"> Dashboard </a>
                </li>
                <li class="nav-item pb-2 pt-2 active">
                  <a href="dashboard-user.php" class="nav-link">
                    Dashboard user
                  </a>
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard-article.php" class="nav-link">
                    Dashboard article</a
                  >
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard-banner.php" class="nav-link">
                    Dashboard Banner</a
                  >
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard-jadwal.php" class="nav-link">
                    Dashboard Jadwal
                  </a>
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard-data-keuangan" class="nav-link">
                    Dashboard Data Kas
                  </a>
                </li>
                
                <li class="nav-item pb-2 pt-2">
                  <a href="dashboard-keuangan" class="nav-link">
                    Dashboard Pengeluaran
                  </a>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
        <div class="w-100">
          <nav class="navbar p-10 navbar-dark">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="d-flex">
                <div class="profile " style="width:30px; height:30px; border-radius:50%; margin-top:auto; margin-bottom:auto; background-position:center; background-repeat:no-repeat; background-size:cover; background-image:url('foto/<?= $query_user["gambar"];?>');"></div>
                <a href="#" class="nav-link text-white ms-2 me-2 mt-auto mb-auto"> <?= $query_user["namalengkap"];?></a>
               <ul class="navbar-nav">
                  <li class="nav-item dropdown ms-2 me-2">
                  <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    menu
                  </a>
                  <ul class="dropdown-menu col-3 ms-auto" style="position:fixed; right:0; ">
                    <li><a class="dropdown-item" href="index">index</a></li>
                    <li><a class="dropdown-item" href="profile">profile siswa</a></li>
                    <li><a class="dropdown-item" href="jadwal">jadwal</a></li>
                    <li><a class="dropdown-item" href="article">article</a></li>
                  </ul>
                </li>
               </ul>
                <ul class="mb-auto mt-auto navbar-nav ">  
                <li class="nav-item">
                 <a href="logout.php" class="d-flex text-white  me-4 ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left " viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg>
                  </a>
                 </li>
                 </ul>
              </div>
            </div>
          </nav>
          <div class="content">
            <div class="container-fluid">
              <div class="title">
                <h1 class="text-white ms-3 mt-3 mb-3">Dashboard User</h1>
              </div>
              <div class="row mt-5 ms-lg-3 me-lg-3">
                <div class="container">
                  <a
                    class="btn btn-success col-lg-2"
                    href="user-action/created.php"
                    >+ ADD NEW USER</a
                  >
                </div>
              </div>
              <div class="col-12" style="overflow: auto">
                <div class="row mt-5 ms-lg-3 me-lg-3">
                  <form action="" method="POST" class="d-flex">
                    <input type="search" name="keyword_user" id="keyword" class="form-control" >
                    <button class="btn btn-success ms-2 " name="cari" id="tombol-cari">Search</button>  
                  </form> 
                  <table class="table text-white">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">email</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <?php $i = 1;?>
                    
                    <?php  
                    foreach( $data as $row ) : 
                    ?> 
                    <tbody>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row["namalengkap"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td>
                          <a href="user-action/edit.php?id=<?=$row["id"];?>">edit</a>
                          <a href="user-action/delete.php?id=<?=$row["id"];?>" onclick="return confirm('yakin?');">delete</a>
                          <a href="user-action/read.php?id=<?=$row["id"];?>">read</a>
                        </td>
                      </tr>
                    </tbody>
                    <?php $i++; ?>
                    <?php endforeach;    
                    ?>
                   
                  </table>
                  <?php  if(!$data):
                      echo "<p class='text-warning text-center'>Empty</p>";
                  endif;?>
                  <?php if($halamanaktif > 1) :?>
                    <a href="?halaman=<?= $halamanaktif - 1; ?>" class="btn btn-success col-1">
                    &lt;
                    </a>
                  <?php endif;?>
                  <?php for($i = 1; $i <= $jumlahHalaman; $i++ ) :?>
                  <?php if( $i == $halamanaktif) :?>
                  <a href="?halaman=<?= $i; ?>" class=" btn btn-success col-1"><?= $i; ?></a>
                  <?php else:?>
                  <a href="?halaman=<?= $i; ?>" class=" btn btn-success col-1"> <?= $i; ?></a>
                  <?php endif;?>
                  <?php endfor;?>
                <!--next-->
                <?php if($halamanaktif < $jumlahHalaman) :?>
                <a href="?halaman=<?= $halamanaktif + 1; ?>" class="btn btn-success col-1">
                &gt;
                </a>
                <?php endif;?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
