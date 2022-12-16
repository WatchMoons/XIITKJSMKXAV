<?php
require '../function.php'; 

$id= $_GET['id'];
if (hapusjadwal($id)>0){
    echo " 
    <script>
    alert('data berhasil dihapus');
    document.location.href='../dashboard-jadwal.php';
    </script>
    ";
}else{
    echo " 
    <script>
    alert('data gagal di hapus');
    document.location.href='../dashboard-jadwal.php';
    </script>
    ";
}


?>