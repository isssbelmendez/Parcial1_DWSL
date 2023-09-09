<?php
session_start();

if ($_SESSION['usuario'] === null) {
    header("Location: ../index.php");
}

include '../Data/Conexion.php';

// Obtén el rol del usuario que ha iniciado sesión
$rolUsuario = $_SESSION['rol'];


$query = "SELECT * FROM usuario";
$ejecutar = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/font/css/all.css">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./Home.php"><i class="fas fa-home"></i>&nbsp; Sitio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../Controller/Salir.php">Cerrar&nbsp; <i class="fas fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center"><i class="fas fa-user"></i>&nbsp;Usuarios</h2>
        <a href="./AgregarUsuario.php" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Nuevo</a><br><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Contraseña</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($datos = mysqli_fetch_array($ejecutar)) {
                        echo "<tr>";
                        echo "<td>" . $datos[0] . "</td>";
                        echo "<td>" . $datos[1] . "</td>";
                        echo "<td>" . $datos[2] . "</td>";
                        echo "<td>" . $datos[3] . "</td>";
                        echo "<td>" . $datos[4] . "</td>";
                        echo "<td>" . $datos[5] . "</td>";
                        echo "<td>" . $datos[6] . "</td>";

                        if ($rolUsuario === 'Administrador') {
                            echo "<td>";
                            echo "<a class='btn btn-warning' href='./ModificarUsuario.php?id=" . $datos[0] . "'><i class='fas fa-edit'></i></a>";
                            echo "<td>";
                            echo "<a class='btn btn-danger' href='../Controller/Usuario.php?id=" . $datos[0] . "'><i class='fas fa-trash'></a>";
                            echo "</td>";
                        } elseif ($rolUsuario === 'Rustico') {
                            echo "<td>";
                            echo "<a class='btn btn-warning' href='./ModificarUsuario.php?id=" . $datos[0] . "'>Modificar</a>";
                            echo "</td>";
                        } else {
                            echo "<td></td><td></td>";
                        }

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>