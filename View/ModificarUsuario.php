<?php

session_start();

if ($_SESSION['usuario'] === null) {
    header("Location: ../index.php");
}

include '../Data/Conexion.php';

$id = $_GET['id'];

$query = "SELECT * FROM usuario WHERE id = '$id'";
$ejecucion = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($ejecucion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/font/css/all.css">
    <title>Modificar Usuario</title>
</head>

<body>
    <h2 class="text-center"><i class="fas fa-file-pen"></i>&nbsp;Modificar Usuario</h2>
    <form action="../Controller/Usuario.php" method="POST">
        <input type="text" name="opcion" value="2" hidden>
        <input type="text" name="id" value="<?php echo $fila['id']; ?>" required hidden>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $fila['nombre']; ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $fila['apellido']; ?>" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo $fila['correo']; ?>" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $fila['usuario']; ?>" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol" name="rol">
                <option value="Administrador" <?php if ($fila['rol'] === 'Administrador') echo 'selected'; ?>>Administrador</option>
                <option value="Rustico" <?php if ($fila['rol'] === 'Rustico') echo 'selected'; ?>>Rustico</option>
                <option value="Basico" <?php if ($fila['rol'] === 'Basico') echo 'selected'; ?>>Basico</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contrasenia">Contraseña</label>
            <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" value="<?php echo $fila['contrasenia']; ?>" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning mr-3">
                <i class="fas fa-pen-to-square"></i> Modificar
            </button>
            <a href="./Home.php" class="btn btn-danger"><i class="fas fa-reply"></i>&nbsp;Cancelar</a>
        </div>
    </form>
</body>

</html>