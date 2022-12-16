<?php
//variable koneksi
$servername = "localhost";
$database = "tkj";
$user = "root";
$password = "";
// membuat koneksi
$conn = mysqli_connect($servername, $user, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());

}
echo "<link rel='icon' href='../images/logo.png' type='image/png' sizes='16x16' />";
echo "<link rel='icon' href='images/logo.png' type='image/png' sizes='16x16' />";
//cattan
//mysqli_close($conn);
//function query($query){
//    global $conn;
//    $result = mysqli_query($conn, $query);
//    $rows = [];
//    while ( $row = mysqli_fetch_assoc($result) ){
//        $rows[] = $row;
//    }
//    return $rows;
//}
//batas cattan

function upload(){
    $nameFile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gamabr yang diuplod
    if($error === 4) {
        echo"<script> 
        alert('pilih gambar terlebih dahulu');
        </script>";
    return false;
    }

    //cek apakah yang diupload adalah gambar
    $akstensiGambarValid = ['jpg','jpeg','png','gif'];
    $akstensiGambar = explode('.',$nameFile);
    $akstensiGambar = strtolower(end($akstensiGambar));
    if( !in_array($akstensiGambar, $akstensiGambarValid)){
        echo" <script>
        alert('yang anda unplod bukan gambar');
        </script>
        ";
        return false;
    }
    if( $ukuranfile > 5000000){
    echo"<script>
    alert('gambar terlalu besar'); </script>
    ";
    return false;
}

    //lolos pengecekan, gambar siap diunplod
    move_uploaded_file($tmpName, '../foto/'.$nameFile);
    return $nameFile;
}
function uploads(){
    $nameFile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gamabr yang diuplod
    if($error === 4) {
        echo"<script> 
        alert('pilih gambar terlebih dahulu');
        </script>";
    return false;
    }

    //cek apakah yang diupload adalah gambar
    $akstensiGambarValid = ['jpg','jpeg','png','gif'];
    $akstensiGambar = explode('.',$nameFile);
    $akstensiGambar = strtolower(end($akstensiGambar));
    if( !in_array($akstensiGambar, $akstensiGambarValid)){
        echo" <script>
        alert('yang anda unplod bukan gambar');
        </script>
        ";
        return false;
    }
    if( $ukuranfile > 5000000){
    echo"<script>
    alert('gambar terlalu besar'); </script>
    ";
    return false;
}

    //lolos pengecekan, gambar siap diunplod
    move_uploaded_file($tmpName, './foto/'.$nameFile);
    return $nameFile;
}
function register($data){
    global $conn;
    //masukan form 
    $username   =strtolower(stripslashes($data["nama"]));
    $password   =htmlspecialchars($data["password"]);
    $password1  =htmlspecialchars($data["password1"]);    
    $email      =strtolower(stripslashes($data["email"]));
    $tanggal    =htmlspecialchars($data["tanggal"]);
    $nomor      =htmlspecialchars($data["nomor"]);
    $alamat     =htmlspecialchars($data["alamat"]);
    $jk         =htmlspecialchars($data["jk"]);
    $maple        =htmlspecialchars($data["maple"]);
    $result         =mysqli_query($conn,"SELECT email FROM tb_user WHERE email='$email'");
    $result_user     =mysqli_query($conn,"SELECT namalengkap FROM tb_user WHERE namalengkap='$username'");

    //mengecek email sudh ada blm
    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('maaf email ini sudah terdaftar');  
        </script>";
        return false;
    }
    //mengecek user sudh ada blm
    if(mysqli_fetch_assoc($result_user)){
        echo"<script>alert('maaf nama ini sudah terdaftar');  
        </script>";
        return false;
    }
    //mengecek apakah password di confirmasi sama ataun tidak
    if($password !== $password1){
        echo"<script>alert('maaf password anda tidak sesuai!!');
        
    </script>";
    return false;
    }
    //enskripsi password
    $password=password_hash($password, PASSWORD_DEFAULT);
    $gambar =  upload();
    $status = $_POST['status'];
    $time =$_POST["time"];
    $insert = mysqli_query($conn,"INSERT INTO tb_user VALUES( 
        NULL, 
        '$username',
        '$email',
        '$password', 
        '$gambar',
        '$jk',
        '$tanggal',
        '$alamat',
        '$nomor',
        '$status',
        '$time',
        '$maple' 
        )");
        return mysqli_affected_rows($conn);
}
function registers($data){
    global $conn;
    //masukan form 
    $username   =strtolower(stripslashes($data["nama"]));
    $password   =htmlspecialchars($data["password"]);
    $password1  =htmlspecialchars($data["password1"]);    
    $email      =strtolower(stripslashes($data["email"]));
    $tanggal    =htmlspecialchars($data["tanggal"]);
    $nomor      =htmlspecialchars($data["nomor"]);
    $alamat     =htmlspecialchars($data["alamat"]);
    $jk         =htmlspecialchars($data["jk"]);
    $maple        =htmlspecialchars($data["maple"]);
    $result     =mysqli_query($conn,"SELECT email FROM tb_user WHERE email='$email'");
    $result_user     =mysqli_query($conn,"SELECT namalengkap FROM tb_user WHERE namalengkap='$username'");
    //mengecek user sudh ada blm
    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('maaf email ini sudah terdaftar');  
        </script>";
        return false;
    }
    if(mysqli_fetch_assoc($result_user)){
        echo"<script>alert('maaf nama ini sudah terdaftar');  
        </script>";
        return false;
    }
    //mengecek apakah password di confirmasi sama ataun tidak
    if($password !== $password1){
        echo"<script>alert('maaf password anda tidak sesuai!!');
        
    </script>";
    return false;
    }
    //enskripsi password
    $password=password_hash($password, PASSWORD_DEFAULT);
    $gambar =  uploads();
    $status = $_POST['status'];
    $time =$_POST["time"];
    $insert = mysqli_query($conn,"INSERT INTO tb_user VALUES( 
        NULL, 
        '$username',
        '$email',
        '$password', 
        '$gambar',
        '$jk',
        '$tanggal',
        '$alamat',
        '$nomor',
        '$status',
        '$time',
        '$maple' 
        )");
        return mysqli_affected_rows($conn);
}
function article($data){
    global $conn;
    //masukan form 
    $article   =strtolower(stripslashes($data["article"]));
    $slug   =strtolower(stripslashes($data["slug"]));
    $id_user   =htmlspecialchars($data["id_user"]);
    $result     =mysqli_query($conn,"SELECT id_user FROM tb_article WHERE id_user='$id_user'");
    $slug_name=strtolower($data["slug"]);
    $slug_url=strtolower($slug_name);
    $slug_url='/'.str_replace(' ','-',$slug_url);
    //mengecek user sudh ada blm
    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('article ini sudah ada');  
        </script>";
        return false;
    }
    $time =$data["time"];
    $insert = mysqli_query($conn,"INSERT INTO tb_article VALUES( 
        NULL, 
        '$id_user',
        '$article',
        '$time',
        '$slug_url'
        )");
        
        return mysqli_affected_rows($conn);       
}
function keuangan($data){
    global $conn;
    //masukan form 
    $id_users   =strtolower(stripslashes($data["id_user"]));
    $absen_siswa =strtolower(stripslashes($data["absen"]));
    $absen_id =strtolower(stripslashes($data["absen_id"]));
    $uang   =strtolower(stripslashes($data["uang"]));
    $query=mysqli_query($conn, "SELECT * FROM tb_data_keuangan WHERE id=$absen_id");
    $data_keuangan=mysqli_fetch_assoc($query);
    $uang_awal=$data_keuangan["total_uang"];
    $total=$uang+$uang_awal;
    $date =$data["time"];
   
    $insert = mysqli_query($conn,"INSERT INTO tb_data_keuangan VALUES( 
        NULL, 
        '$id_users',
        '$date',
        '$uang',
        '$total',
        '$absen_siswa'
        )");    
    $querys="UPDATE tb_data_keuangan SET 
        total_uang = '$total'      
        WHERE id_user       =  $id_users
        ";

    mysqli_query($conn, $querys) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function banner($data){
    global $conn;
    //masukan form 
    $judul   =strtolower(stripslashes($data["judul"]));
    $gambar =  upload();
      
    $time =$data["time"];
    $insert = mysqli_query($conn,"INSERT INTO tb_banner VALUES( 
        NULL, 
        '$judul',
        '$gambar',
        '$time'
        )");
        
        return mysqli_affected_rows($conn);       
}
function jadwal($data){
    global $conn;
    //masukan form 
    $nama_mapel   =strtolower(stripslashes($data["nama_maple"]));
    $nama_guru    =strtolower(stripslashes($data["nama_guru"]));
    $jam_ke       =htmlspecialchars($data["jam_ke"]);
    $id_jam       =htmlspecialchars($data["id_jam"]);
    $hari         =htmlspecialchars($data["hari"]);
    $insert = mysqli_query($conn,"INSERT INTO tb_jadwal VALUES( 
        NULL, 
        '$hari',
        '$nama_mapel',
        '$nama_guru',
        '$jam_ke',
        '$id_jam'
        )");
         
        return mysqli_affected_rows($conn);       
}
//hapus
function hapususer($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusarticle($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_article WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusdatauang($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_data_keuangan WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusbanner($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_banner WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusjadwal($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_jadwal WHERE id = $id");
    return mysqli_affected_rows($conn);
}
//edit
function edit_user($data){
     global $conn;
    $id             = $data["id"];
    $username       = htmlspecialchars($data["nama"]);
    $email          = htmlspecialchars($data["email"]);
    $tanggal        = htmlspecialchars($data["tanggal"]);
    $jk             = htmlspecialchars($data["jk"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $nomor_telepon  = htmlspecialchars($data["nomor"]);
    $gambarlama     = htmlspecialchars($data["gambarlama"]);
    $maple          = htmlspecialchars($data["maple"]);
    $level          = htmlspecialchars($data["level"]);
    $waktu          = htmlspecialchars($data["waktu"]);
    //cek apakah user pilihan gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar =  upload();
    }

    $query="UPDATE tb_user SET namalengkap   = '$username',
        email          = '$email',
        gambar         = '$gambar',
        jeniskelamin   = '$jk',
        tanggallahir   = '$tanggal',
        alamat         = '$alamat',
        nomortelepon   = '$nomor_telepon',
        level          = '$level',
        waktu_pembuatan = '$waktu',
        maple           = '$maple'
        WHERE id       =  $id
        ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function edit_users($data){
     global $conn;
    $id =  $data["id"];
    $username       = htmlspecialchars($data["nama"]);
    $email          = htmlspecialchars($data["email"]);
    $tanggal        = htmlspecialchars($data["tanggal"]);
    $jk             = htmlspecialchars($data["jk"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $nomor_telepon  = htmlspecialchars($data["nomor"]);
    $gambarlama     = htmlspecialchars($data["gambarlama"]);
  
   
    //cek apakah user pilihan gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar =  uploads();
    }

    $query="UPDATE tb_user SET namalengkap   = '$username',
        email          = '$email',
        gambar         = '$gambar',
        jeniskelamin   = '$jk',
        tanggallahir   = '$tanggal',
        alamat         = '$alamat',
        nomortelepon   = '$nomor_telepon' 
        WHERE id       =  $id
        ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function edit_banner($data){
    global $conn;
    $id             = $data["id"];
    $judul       = htmlspecialchars($data["judul"]);
    $gambarlama     = htmlspecialchars($data["gambarlama"]);
    $time          = htmlspecialchars($data["time"]);
    //cek apakah user pilihan gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar =  upload();
    }

    $query="UPDATE tb_banner SET 
        judul           = '$judul',
        gambar          = '$gambar',
        tanggal_post    = '$time'
        WHERE id        =  $id
        ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function edit_keuangan($data){
    global $conn;
    $id             = $data["id"];
    $nomor_absen    = $data["nomor"];
    

    $query="UPDATE tb_data_keuangan SET 
        nomor_absen     = '$nomor_absen'
        WHERE id        =  $id
        ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function edit_article($data){
    global $conn;
    $id            = $data["id"];
    $article       = strtolower(stripslashes($data["article"]));
    $query="UPDATE tb_article SET 
    article   = '$article'
    WHERE id  =  $id
    ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function edit_jadwal($data){
    global $conn;
    $id            = $data["id"];
    $hari       = strtolower(stripslashes($data["hari"]));
    $nama_maple = strtolower(stripslashes($data["nama_maple"]));
    $nama_guru = strtolower(stripslashes($data["nama_guru"]));
    $id_time = strtolower(stripslashes($data["id_jam"]));
    $query="UPDATE tb_jadwal SET 
    hari        ='$hari',
    nama_maple  ='$nama_maple',
    nama_guru   ='$nama_guru',
    id_time     ='$id_time'
    WHERE id  =  $id
    ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function change_password($data){
    global $conn;
    $id         =  $data["id"];
    $password   =  htmlspecialchars($data["password"]);
    $password   =  password_hash($password, PASSWORD_DEFAULT);
    $query      ="UPDATE tb_user SET
                password = '$password'        
                WHERE id = $id
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
//query
 
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
//search engine
function cariuser($keyword){
    $query="SELECT * FROM tb_user
    WHERE
    namalengkap LIKE '%$keyword%' OR
    email LIKE '%$keyword%'
    ";
return query($query);
}
function caribanner($keyword){
    $query="SELECT * FROM tb_banner
    WHERE
    judul LIKE '%$keyword%' OR
    gambar LIKE '%$keyword%' OR
    tanggal_post LIKE '%$keyword%'
    ";

return query($query);
}
function cariarticle($keyword){
    $query="SELECT * FROM tb_article
    WHERE
    id_user LIKE '%$keyword%' OR
    article LIKE '%$keyword%'
    ";
    $querys="SELECT * FROM tb_user
    WHERE
    namalengkap LIKE '%$keyword%'
    ";
return query($query);
}
?>

  