<?php
include "function.php";
session_start();
if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
$id=$_SESSION['UID'];
$profile= query("SELECT * FROM tb_user WHERE id = $id")[0];
if(isset($_POST["save"])){
if (article($_POST) > 0 ) {
   echo " 
    <script>
    alert('data berhasil tambahkan');
    document.location.href='create.php';
    </script>
    ";
    }else{
      echo " 
      <script>
      alert('data gagal di tambahkan');
      document.location.href='create.php';
      </script>
      ";
    }
}

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
    <style>
        .navbar-fixed-top{
      position: sticky;
      position: -webkit-sticky;
      top: 0;
      z-index: 1;
    }
    </style>
    <link rel="stylesheet" href="style/style.css" />
    <title>XII TKJ |Pengaturan</title>
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
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
        <div class="container">
          <a class="navbar-brand" href="profile.php">Article Page</a>
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
                <a class="nav-link" href="index.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Profile Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Jadwal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">article</a>
              </li>
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
              if($_SESSION["login"] = true):
              ?>
              <li class="d-flex">
                <div
                  class="profile"
                  style="
                    background-image: url('foto/<?= $profile["gambar"];?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                    border-radius: 50%;
                    background-position: center;
                    width: 40px;
                    height: 40px;
                  "
                ></div>
                <p class="mt-auto mb-auto ms-2"><?= $profile["namalengkap"];?></p>
                <a
                  href="setting.php"
                  class="text-secondary mt-auto mb-auto ms-1 d-flex"
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
        <div class="row mt-4 mb-5">
          <div class="card col-10 m-auto">
            <div class="card-body">
               <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group text-white">
                          <label>Description</label>
                          <textarea name="article" id=""></textarea>
                      </div>
                     <input type="hidden" name="id_user" value="<?= $id; ?>">
                     <?php
                     $data_query=mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id'");
                     $data_user=mysqli_fetch_assoc($data_query);
                     ?>
                     <input type="hidden" name="slug" value="<?= $data_user["namalengkap"]; ?>">
                   
                     
                     
                      <input type="hidden" name="time" value="<?= date('y-m-d') ?>">
                      <div class="mt-2 mb-2">
                      <button
                        type="submit"
                        class="btn btn-primary mt-3 col-12"
                        name="save"
                      >
                        save
                      </button>
                    </div>
                  </form>
            </div>
          </div>
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
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("article");
    </script>
  </body>
</html>
