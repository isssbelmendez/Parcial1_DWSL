<?php
session_start();

if ($_SESSION['usuario'] === null) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/font/css/all.css">
    <title>Insertar Usuario</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center"><i class="fas fa-list"></i>&nbsp;Formulario</h2>
        <form action="../Controller/Usuario.php" method="POST">
            <input type="text" hidden value="1" name="opcion">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" id="rol" name="rol">
                    <option value="Administrador">Administrador</option>
                    <option value="Rustico">Rustico</option>
                    <option value="Basico">Basico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mr-3">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="./Home.php" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>