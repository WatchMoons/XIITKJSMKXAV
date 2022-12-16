<?php include "function.php";
if(!isset($_SERVER["PATH_INFO"])=="register.php"){
 header("location: register");
 exit;
}
if(isset($_POST["save"])){
  if(registers($_POST) > 0){
     echo " 
      <script>
      alert('data berhasil di tambahkan');
      document.location.href='register';
      </script>
      ";
  }else{
     echo " 
      <script>
      alert('data gagal di tambahkan');
      document.location.href='register';
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
    <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16" />  
    <title>XII TKJ | Register</title>
    <style>
      .background-body {
        background-image: linear-gradient(
          to right,
          rgb(206, 101, 255),
          rgb(38, 54, 124)
        );
      }
    </style>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body class="background-body">
    <section>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index">TKJ</a>
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
                <a class="nav-link" aria-current="page" href="index">
                  Home
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile">Profile Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jadwal">Jadwal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div
        class="card col-lg-8 col-10 me-auto ms-auto"
        style="margin-top: 9rem; margin-bottom: 8rem"
      >
        <div class="card-body">
          <h1 class="text-center">REGISTER</h1>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="time" value="<?= date('y-m-d') ?>" />
            <input type="hidden" name="status" value="user" />
            <input type="hidden" name="maple" value="Tidak_mengajar" />
            <div class="mb-2 mt-2">
              <label for="nama">Nama Lengkap</label>
              <input
                type="text"
                id="nama"
                value=""
                name="nama"
                class="form-control"
                placeholder="Nama_Lengkap"
              />
            </div>
            <div class="mb-2 mt-2">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                value=""
                name="email"
                class="form-control"
                placeholder="Email"
              />
            </div>
            <div class="mb-2 mt-2">
              <label for="tanggal">Tempat, Tanggal Lahir</label>
              <input
                type="text"
                value=""
                id="tanggal"
                name="tanggal"
                class="form-control"
                placeholder="tanggal lahir"
              />
            </div>
            <div class="mb-2 mt-2">
              <label for="nomor">Nomor Telepon</label>
              <input
                type="text"
                id="nomor"
                value=""
                name="nomor"
                class="form-control"
                placeholder="+62..."
              />
            </div>
            <div class="mb-2 mt-2">
              <label for="alamat">Alamat</label>
              <input
                type="text"
                id="alamat"
                value=""
                name="alamat"
                class="form-control"
                placeholder="alamat"
              />
            </div>
            <div>
              <label for="password">Password</label>
            </div>
            <div class="mb-2s mt-2 d-flex">
              <div class="d-flex">
                <div class="">
                  <input
                    type="password"
                    id="password"
                    name="password"
                    value=""
                    class="form-control"
                    placeholder="password..."
                  />
                </div>
              </div>
              <div class="d-flex">
                <div class="">
                  <input
                    type="password"
                    value=""
                    id="password1"
                    name="password1"
                    class="form-control"
                    placeholder="Konfirmasi password..."
                  />
                </div>
              </div>
            </div>
            <div class="mb-2 mt-2">
              <div class="mb-3" data-aos="fade-left" data-aos-delay="600">
                <label for="formFileSm" class="form-label">foto :</label>
                <input
                  class="form-control form-control-sm"
                  id="formFileSm"
                  name="gambar"
                  type="file"
                  required
                />
              </div>
            </div>
            <div class="mb-2 mt-2">
              <input
                type="radio"
                name="jk"
                value="laki-laki"
                id="L"
                class="form-check-input me-2"
              />
              <label for="L">laki-laki</label>
              <input
                type="radio"
                name="jk"
                value="Perempuan"
                id="P"
                class="form-check-input me-2"
              /><label for="P">Perempuan</label>
            </div>
            <div class="mt-2 mb-2">
              <button
                type="submit"
                class="btn btn-primary mt-3 col-12"
                name="save"
              >
                register
              </button>
            </div>
          </form>
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
