<?php 
session_start();
if(!isset($_SESSION["RegNo"])){
header("location: index.php");
exit();
}


?>