<?php
session_start();
include './Data/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $query = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasenia = '$contrasenia'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['usuario'] = $correo;
        $_SESSION['rol'] = $row['rol'];

        header("Location: ./View/Home.php");
        exit();
    } else {
        $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/font/css/all.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-color: #343a40;">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Inicio de Sesión</h5>
                <form action="" method="post">
                    <div class="mb-3 text-center">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control text-center" name="correo" aria-describedby="emailHelp" placeholder="Ingrese su Correo electrónico" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="contrasenia" class="form-label">Contraseña</label>
                        <input type="password" class="form-control text-center" name="contrasenia" placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-right-to-bracket"></i>&nbsp;Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>