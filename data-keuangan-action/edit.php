<?php
include "../function.php";
$id=$_GET["id"];
$data = query("SELECT * FROM tb_data_keuangan WHERE id='$id'")[0];
if(isset($_POST["save"])){
if (edit_keuangan($_POST) > 0 ) {
    echo " 
    <script>
    alert('data berhasil diubah');
    document.location.href='edit.php?id=$id';
    </script>
    ";
    }else{
      echo " 
      <script>
      alert('data gagal di ubah');
      document.location.href='edit.php?id=$id';
      </script>
      ";
    }
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
      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: white;
      opacity: 1; /* Firefox */
      }

      :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: white;
      }

      ::-ms-input-placeholder { /* Microsoft Edge */
      color: white;
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
             
              <div class="row col-lg-10 ms-auto mt-3 me-auto">
               <form  method="POST" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?= $data["id"];?>">
               
               <table class="table text-white ">
                  <thead>
                    <?php
                    $id_users=$data["id_user"];
                    $user_query=mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id_users'");
                    $user_show=mysqli_fetch_assoc($user_query);
                    ?>
                    <tr>
                      <th scope="col">#</th>
                      <th>Nama_lengkap</th>
                      <td><?= $user_show["namalengkap"]; ?></td>
                    </tr> 
                     <tr>
                      <th scope="col">#</th>
                      <th>Nomor Absen</th>
                      <td>
                        <select name="nomor" id="" class="from-control">
                          <option value="<?= $data["nomor_absen"]; ?>"><?= $data["nomor_absen"]; ?>(Active)</option>
                        <?php
                        for($in=0; $in<=30; $in++ ){
                        ?>  
                        <option value="<?= $in;?>"><?= $in;?></option>
                        <?php
                        }
                        ?>      
                        </select>
                    </td>
                    </tr>
                    <tr>
                      <td colspan="3"> <button type="submit" class="btn btn-success col-12" name="save">Save</button></td>
                    </tr>
                  </thead>          
                </table>
                </form>
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
