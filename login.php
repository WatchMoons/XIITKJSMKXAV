<?php
include "function.php";
if(!isset($_SERVER["PATH_INFO"])=="login.php"){
 header("location: login");
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>XIITKJ</title>
   
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
     <?php
  //cek cookie
    session_start();
    if(isset($_SESSION["login"])){
      header( "location: dashboard.php");
      exit;
    }
    
    
    if( isset($_POST["login"]) ) {
    
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
        
        //cek username
        if( mysqli_num_rows($result) === 1 ){
            
            //cek password
            $row = mysqli_fetch_assoc($result);
            $level=$row["level"];
            $id=$row["id"];
            if( password_verify($password, $row["password"]) ) {
                //set session
                $_SESSION["id"]=$id;
                $_SESSION["login"] = true;
                $_SESSION['UID'] =$row['id'];
                $_SESSION['level'] = $level;
  
                //lokasi yang ingin dituju
                
                
                header( "location: dashboard");
                exit;           
                
                
            }else{
              echo "<script>alert('Harap di cek lagi password dan user anda');</script>";
            }
        }
        $error = true;
    }
  ?>
    <section>
      <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
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
                <a class="nav-link" aria-current="page" href="index.php">
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
                <a class="nav-link " href="register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div
        class="card col-lg-3 col-10 me-auto ms-auto"
        style="margin-top: 9rem; margin-bottom: 8rem"
      >
        <div class="card-body">
          <h1 class="text-center">LOGIN</h1>
          <form action="" method="post">
            <div class="mb-2 mt-2">
              <label for="email">Email</label>
              <input
                type="email"
                name="email"
                placeholder="email..."
                class="form-control"
                required
              />
            </div>
            <div class="mb-2 mt-2">
              <label for="password">Password</label>
              <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="password..."
                required
              />
            </div>
            <div class="mb-2 mt-2">
              <button type="submit" name="login" class="col-12 btn btn-primary">
                Login
              </button>
            </div>
            <div class="mb-2 mt-2 col-10 ms-auto me-auto d-flex">
              <p class="text-center">
                <a
                  href="register.php"
                  class="link-secondary nav-link text-center"
                  >Lupa Password?&nbsp;</a
                >
              </p>
              <p class="text-center">
                <a href="index.php" class="link-secondary nav-link text-center"
                  >&nbsp;back home page</a
                >
              </p>
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
