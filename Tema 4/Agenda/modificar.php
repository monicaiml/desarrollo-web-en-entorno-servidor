<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "funciones.php";

$error = "";
$mensaje = "";

$contactoEncontrado = false; //todavia no hemos econtrado ningun contacto

// Comprobar que el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Comprobar que el usuario es administrador
if ($_SESSION["tipo"] != "administrador") {
    exit("No tienes permiso para modificar contactos");
}

// Recuperar los datos enviados por POST
$dni = $_POST["dni"] ?? "";
$nombre = $_POST["nombre"] ?? "";
$telefono = $_POST["telefono"] ?? "";
$email = $_POST["email"] ?? "";

// Leer los contactos existentes
$contactos = leerContactos($archivo);

// Comprobar si se ha pulsado el botón de buscar
if (isset($_POST["buscar"])) {

    if (empty(trim($dni))) {

        $error = "Debes introducir un DNI";
    } else {

        $contacto = buscarContacto($contactos, $dni);

        if ($contacto !== false) {

            $contactoEncontrado = true; //contacto encontrado

            $nombre = $contacto["nombre"];
            $telefono = $contacto["telefono"];
            $email = $contacto["email"];
        } else {

            $error = "No existe ningún contacto con ese DNI";
        }
    }
}

// Comprobar si se ha pulsado el botón de guardar cambios
if (isset($_POST["modificar"])) {

    // Validar los campos obligatorios
    if (
        empty(trim($nombre)) ||
        empty(trim($dni)) ||
        empty(trim($email))
    ) {

        $error = "El nombre, el DNI y el email son obligatorios";

        $contactoEncontrado = true; //mantiene que se he encontardo
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "El correo electrónico no es válido";

        $contactoEncontrado = true; //mantiene que se ha encontrado
    } else {

        // Intentar modificar el contacto
        if (modificarContacto($contactos, $dni, $nombre, $telefono, $email, $archivo)) {

            $mensaje = "Contacto modificado correctamente";

            $nombre = "";
            $dni = "";
            $telefono = "";
            $email = "";

            $contactoEncontrado = false; // ya se ha modificado el contacto, entonces volver  ainiciar el valor a false
        } else {

            $error = "No se ha podido modificar el contacto";
            $contactoEncontrado = true; //mantiene que se ha encontrado
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contacto</title>
</head>

<body>

    <h1>Modificar contacto</h1>

    <!-- Formulario para buscar el contacto -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

        <fieldset>
            <legend>Buscar contacto</legend>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required
                value="<?= htmlspecialchars($dni) ?>">

            <button type="submit" name="buscar" value="Buscar contacto">Buscar contacto</button>

        </fieldset>

    </form>

    <br>

    <?php if ($contactoEncontrado) { ?>

        <!-- Formulario para modificar los datos -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

            <fieldset>
                <legend>Modificar datos del contacto</legend>

                <input type="hidden" name="dni"
                    value="<?= htmlspecialchars($dni) ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required
                    value="<?= htmlspecialchars($nombre) ?>">

                <br><br>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono"
                    value="<?= htmlspecialchars($telefono) ?>">

                <br><br>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required
                    value="<?= htmlspecialchars($email) ?>">

                <br><br>

                <button type="submit" name="modificar" value="Guardar cambios">Guardar Cambios</button>

            </fieldset>

        </form>

    <?php } ?>

    <p><?= htmlspecialchars($error) ?></p>
    <p><?= htmlspecialchars($mensaje) ?></p>

    <br>

    <a href="agenda.php">Volver a la agenda</a>

</body>

</html>