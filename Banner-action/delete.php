<?php
require '../function.php'; 

$id= $_GET['id'];
if (hapusbanner($id)>0){
    echo " 
    <script>
    alert('data berhasil dihapus');
    document.location.href='../dashboard-banner.php';
    </script>
    ";
}else{
    echo " 
    <script>
    alert('data gagal di hapus');
    document.location.href='../dashboard-banner.php';
    </script>
    ";
}


?>