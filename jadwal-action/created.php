<?php
include "../function.php";

if(isset($_POST['save'])){
    
    if(jadwal($_POST) > 0 ){
        echo "<script> alert('berhasil di tambhkan');</script>";
    }else{
        echo "<script> alert('gagal di tambahkan');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>XII TKJ | Dashboard Created</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/style.css" />
    <style>
      .navbar-fixed-top.scrolled::after {
        content: "";
        height: 100%;
        width: 100%;
        z-index: -2;
        background-image: url("../images/dark\ 12.jpg");
        background-position: center;
        background-size: cover;
        position: absolute;
        opacity: 0.7;
      }

      .dashboard-created .content .card-glass::after {
        content: "";
        height: 100%;
        width: 100%;
        z-index: -1;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
          rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
          rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        border-radius: 20px;
        background-image: url("../images/dark\ 12.jpg");
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
        background-image: url("../images/dark\ 12.jpg");
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
        background-image: url("../images/dark\ 12.jpg");
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
    <section class="dashboard dashboard-created">
      <div class="d-flex">
        <div
          class="sidebar navbar-expand col-lg-2 m-3 fixed-xl-top"
          style="transition: 1s all"
          id="navbarScroll"
        >
          <div class="navbarside p-4" style="height: 95vh">
            <div class="container">
              <div class="logo me-auto ms-auto mt-lg-2 mt-5">
                <img src="../images/admin.png" alt="" class="w-75" />
              </div>
            </div>
            <div class="menu">
              <ul class="text-white link">
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard.php" class="nav-link"> Dashboard </a>
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard-user.php" class="nav-link">
                    Dashboard user
                  </a>
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard-article.php" class="nav-link">
                    Dashboard article</a
                  >
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard-banner.php" class="nav-link">
                    Dashboard Banner</a
                  >
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard-jadwal.php" class="nav-link">
                    Dashboard Jadwal
                  </a>
                </li>
                <li class="nav-item pb-2 pt-2">
                  <a href="../dashboard-keuangan.php" class="nav-link">
                    Dashboard Keuangan
                  </a>
                </li>
                <li>
                  <a href="../logout.php" class="nav-link">logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="w-100">
          <nav class="navbar p-10 navbar-dark" style="z-index: 2">
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
                <a href="#" class="nav-link text-white"> Jefli Jonathan</a>
              </div>
            </div>
          </nav>
          <div class="content mt-4">
            <div class="container">
              <div class="card-glass m-auto col-lg-12 pe-3 ps-3">
                <div class="card-body">
                  <form  method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="time" value="<?= date('y-m-d') ?>">  
                  <input type="hidden" name="status" value="user">
                  <div class="mb-2 mt-2 text-white">
                    <label for="hari">Hari</label>
                    <select name="hari" id="hari" class="text-white form-control bg-dark">
                      <option value="senin">senin</option>
                      <option value="selasa">selasa</option>
                      <option value="rabu">rabu</option>
                      <option value="kamis">kamis</option>
                      <option value="jumat">jumat</option>
                      <option value="sabtu">sabtu</option>
                      <option value="minggu">minggu</option>
                    </select>
                  </div>
                    <div class="mb-2 mt-2 text-white">
                      <label for="nama_maple">Nama Maple</label>
                      <input
                        type="text"
                        id="nama_maple"
                        value=""
                        name="nama_maple"
                        class="form-control text-white bg-dark"
                        placeholder="Nama_Maple..."
                      />
                    </div>
                    <div class="mb-2 mt-2 text-white">
                      <label for="nama_guru">Nama Guru</label>
                      <input
                        type="text"
                        id="nama_guru"
                        value=""
                        name="nama_guru"
                        class="form-control text-white bg-dark"
                        placeholder="Nama_Guru..."
                      />
                    </div>
                    <div class="mb-2 mt-2 text-white">
                      <label for="jam_ke">Jam Ke sampai dengan</label>
                      <input
                        type="text"
                        value=""
                        id="jam_ke"
                        name="jam_ke"
                        class="form-control text-white bg-dark"
                        placeholder="jam_ke"
                      />
                    </div>
                    <div class="mb-2 mt-2 text-white">
                      <label for="id_jam">id_jam</label>
                      <select name="id_jam" id="id_jam" class="form-control text-white bg-dark">
                        <?php $i=10;
                        for($i=1; $i <= 20; $i++) :
                        ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        endfor;
                        ?>
                      </select>
                    </div>                 
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
