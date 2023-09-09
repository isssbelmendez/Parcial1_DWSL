<?php
session_start();

if($_SESSION['usuario'] === null){
    header("Location: ../index.php");
}

$opcion = $_POST['opcion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];
$contrasenia = $_POST['contrasenia'];

include '../Data/Conexion.php';

if ($opcion == 1) {
    $query = "INSERT INTO usuario (id,nombre,apellido,correo,usuario,rol,contrasenia) VALUES(NULL,'$nombre','$apellido','$correo','$usuario','$rol','$contrasenia')";
    $ejecutar = mysqli_query($conexion, $query);
    if ($ejecutar) {
        header("Location: ../View/Home.php");
        exit;
    } else {
        header("Location: ./Usuario.php");
        exit;
    }
} else if ($opcion == 2) {
    $id = $_POST['id'];
    $query = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', correo='$correo', usuario='$usuario', rol='$rol',contrasenia = '$contrasenia' WHERE id='$id'";
    $ejecutar = mysqli_query($conexion, $query);
    if ($ejecutar) {
        header("Location: ../View/Home.php");
        exit;
    } else {
        header("Location: ./Usuario.php");
        exit;
    }
} else {
    $id = $_GET['id'];
    $query = "DELETE FROM usuario WHERE id='$id'";
    $ejecutar = mysqli_query($conexion, $query);
    if ($ejecutar) {
        header("Location: ../View/Home.php");
        exit;
    } else {
        header("Location: ./Usuario.php");
        exit;
    }
}
