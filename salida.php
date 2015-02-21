<?php  
session_start();  
unset($_SESSION['pas']);  
header('Location: index.php');  
?>  
