<?php
session_start();

if($_SESSION['usuario'] === null){
    header("Location: ../index.php");
}
session_destroy();
header("Location: ../index.php");
?>