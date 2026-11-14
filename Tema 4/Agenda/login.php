<?php

session_start();

$error = ""; //guarda un mensaje cuando algo salga mal


error_reporting(E_ALL);
ini_set('display_errors', 1);

// Usuarios disponibles
$usuarios = [
    [
        "usuario" => "admin",
        "password" => "admin",
        "rol" => "administrador"
    ],
    [
        "usuario" => "usuario1",
        "password" => "1234",
        "rol" => "usuario"
    ]
];

if (isset($_POST["enviar"])) {

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    foreach ($usuarios as $u) {

        if ($usuario == $u["usuario"] && $password == $u["password"]) {

            $_SESSION["nombre"] = $u["usuario"];
            $_SESSION["tipo"] = $u["rol"];

            //recoge el nombre que hay en el array y guarda ese valor en la sesión para utilizarlo en otras páginas

            header("Location: agenda.php"); // redirige a la pagina agenda
            exit();
        }
    }

    $error = "Usuario o contraseña incorrectos";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit" name="enviar">Iniciar sesión</button>

    </form>

    <p><?= htmlspecialchars($error) ?></p>

</body>

</html>