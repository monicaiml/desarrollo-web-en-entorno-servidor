<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Contador de visitas con cookies
if (isset($_POST["guardarCookie"])) {

    $accesos = $_COOKIE["accesos"] ?? 0; //accesos nombre de la cookie
    $accesos++;

    setcookie("accesos", $accesos, time() + 3600);

    /*Si la cookie no existe, crear
    Si la cookie ya existe, actualizar su valor.*/
} elseif (isset($_POST["guardarPreferencia"])) {

    setcookie("accesos", "", time() - 3600);
}

?>

/*Si marcas la casilla y pulsas Guardar: se ejecuta el if y la cookie se crea o se actualiza (incrementa el contador).
Si no marcas la casilla y pulsas Guardar: se ejecuta el elseif y la cookie se elimina
Si no pulsas Guardar, no ocurre absolutamente nada con la cookie.*/

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>

<body>

    <h1>Mi agenda de contactos</h1>

    <h2>Bienvenido <?= htmlspecialchars($_SESSION["nombre"]) ?></h2>

    <h3>Menú de opciones</h3>

    <form action="crud.php" method="POST">

        <button type="submit" name="enviado" value="1">
            Insertar contacto
        </button>

        <button type="submit" name="enviado" value="2">
            Consultar contactos
        </button>

    </form>

    <?php if ($_SESSION["tipo"] == "administrador") { ?>

        <h3>Opciones de administrador</h3>

        <form action="crud.php" method="POST">

            <button type="submit" name="enviado" value="3">
                Modificar contacto
            </button>

            <button type="submit" name="enviado" value="4">
                Eliminar contacto
            </button>

        </form>

    <?php } ?>

    <h3>Cookies</h3>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

        <label>
            <input type="checkbox" name="guardarCookie">
            Acepto guardar la cookie
        </label>

        <button type="submit" name="guardarPreferencia" value="Guardar">Guardar</button>
    </form>

    <p>Visitas: <?= $_COOKIE["accesos"] ?? 0 ?></p>

    <br><br>

    <form action="logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>

</body>

</html>