<?php
session_start();
if(isset($_SESSION['pass'])){
    echo 'true';
} else {
    echo 'false';
}
?>