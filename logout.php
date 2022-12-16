<?php
session_start();
session_destroy();
 if(!isset($_SERVER["PATH_INFO"])=="logout.php"){
 header("location: logout");
 exit;
}
header("Location: index");
?>