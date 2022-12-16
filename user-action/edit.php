<?php
include "../function.php";
$id=$_GET["id"];
$data = query("SELECT * FROM tb_user WHERE id='$id'")[0];
if(isset($_POST["save"])){
if (edit_user($_POST) > 0 ) {
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
if(isset($_POST["change_password"])){
if (change_password($_POST) > 0 ) {
    echo " 
    <script>
    alert('PASSWORD berhasil diubah');
    document.location.href='edit.php?id=$id';
    </script>
    ";
    }else{
      echo " 
      <script>
      alert('PASSWORD gagal di ubah');
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
              <div class="row">
                <h1 class="text-center text-white"><?= $data["namalengkap"]; ?> (<?= $data["level"]; ?>)</h1>
                <div class="m-auto " 
                style=" 
                height:100px;
                width:100px;
                border-radius:50%;
                background-image:url('../foto/<?= $data['gambar'] ?>');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                ">
                  
                </div>  
              </div>
              <div class="row col-lg-10 ms-auto mt-3 me-auto">
               <form  method="POST" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?= $data["id"];?>">
          <input type="hidden" name="gambarlama" value="<?= $data["gambar"];?>"> 
               <table class="table text-white ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Nama Lengkap </th>
                      <td><input type="text" class="form-control bg-secondary text-white" name="nama" value="<?= $data["namalengkap"]; ?>"></td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th>Email</th>
                      <td><input type="text" class="form-control bg-secondary text-white" name="email" value="<?= $data["email"]; ?>"></td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th>Tanggal Lahir </th>
                      <td><input type="text" class="form-control bg-secondary text-white" name="tanggal" value="<?= $data["tanggallahir"]; ?>"></td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th>Jenis Kelamin(<?= $data["jeniskelamin"]; ?>) </th>
                      <td>
                        <input type="hidden" name="jk" value="<?= $data["jeniskelamin"]; ?>">
                        <input type="radio" name="jk" id="L" value="laki-laki"><label for="L">laki-laki</label>
                    <input type="radio" name="jk" id="P" value="perempuan"><label for="P">perempuan</label>
                    
                      </td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th>Alamat </th>
                      <td><input type="text" class="form-control bg-secondary text-white" name="alamat" value="<?= $data["alamat"]; ?>"></td>
                    </tr>
                     <tr>
                      <th scope="col">#</th>
                      <th>Nomor Telepon </th>
                      <td><input type="text" class="form-control bg-secondary text-white" name="nomor" value="<?= $data["nomortelepon"]; ?>"></td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th>Status Pengguna(<?= $data["level"];?>) </th>
                      <td>
                    <input type="hidden" name="level" value="<?= $data["level"]; ?>">
                    <input type="radio" name="level" id="user" value="user"><label for="user">user</label>
                    <input type="radio" name="level" id="murid" value="murid"><label for="murid">murid</label>
                    <input type="radio" name="level" id="admin" value="admin"><label for="admin">admin</label>
                    <input type="radio" name="level" id="guru" value="guru"><label for="guru">guru</label>
                    </td>
                    </tr>
                     <tr>
                      <th scope="col">#</th>
                      <th>Avatar </th>
                      <td><input type="file" name="gambar" class="form-control bg-secondary text-white"></td>
                    </tr>
                     <tr>
                      <th scope="col">#</th>
                      <th>Waktu Pembuatan : </th>
                      <td>: <input type="hidden" name="waktu" value='<?= $data["waktu_pembuatan"]; ?>'> <?= $data["waktu_pembuatan"]; ?></td>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th >mapel_guru</th>
                      <th><select name="maple" id="" class="form-control bg-secondary text-white">
                      <option value="<?= $data["maple"];?>"><?= $data["maple"];?></option>  
                      <option value="Tidak_mengajar">Tidak Mengajar</option>  
                      <option value="bahasa_indonesia">Bahasa Indonesia</option>
                        <option value="bahasa_inggris">Bahasa Inggris</option>
                        <option value="matematika">Matematika</option>
                        <option value="TLJ">TLJ</option>
                        <option value="AIJ">AIJ</option>
                        <option value="PKK">PKK</option>
                        <option value="ASJ">ASJ</option>
                        <option value="PKN">PKN</option>
                      </select></th>
                    </tr>
                    <tr>
                      <td colspan="3"> <button type="submit" class="btn btn-success col-12" name="save">Save</button></td>
                    </tr>
                  </thead>          
                </table>
                </form>
                <form  method="POST">
                  <input type="hidden" name="id" value="<?= $data['id'];?>">
                  <div class="d-flex">
                  <input type="password" class="form-control bg-white text-dark w-25" placeholder="newpassword..." name="password">
                  <button type="submit" name="change_password" class="btn btn-success ms-2 me-2">save</button>
                </div>
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
