<?php
require '../function.php'; 

$id= $_GET['id'];
if (hapusdatauang($id)>0){
    echo " 
    <script>
    alert('data berhasil dihapus');
    document.location.href='../dashboard-data-keuangan';
    </script>
    ";
}else{
    echo " 
    <script>
    alert('data gagal di hapus');
    document.location.href='../dashboard-data-keuangan';
    </script>
    ";
}


?>