<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "funciones.php";

$error = "";
$mensaje = "";

$contactoEncontrado = false;

// Comprobar que el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Comprobar que el usuario es administrador
if ($_SESSION["tipo"] != "administrador") {
    exit("No tienes permiso para eliminar contactos");
}

// Recuperar el DNI enviado por POST
$dni = $_POST["dni"] ?? "";

// Leer los contactos existentes
$contactos = leerContactos($archivo);

// Comprobar si se ha pulsado el botón de buscar
if (isset($_POST["buscar"])) {

    if (empty(trim($dni))) {

        $error = "Debes introducir un DNI";
    } else {

        $contacto = buscarContacto($contactos, $dni);

        if ($contacto !== false) {

            $contactoEncontrado = true;
        } else {

            $error = "No existe ningún contacto con ese DNI";
        }
    }
}

// Comprobar si se ha confirmado la eliminación
if (isset($_POST["confirmar"])) {

    if (eliminarContacto($contactos, $dni, $archivo)) {

        $mensaje = "Contacto eliminado correctamente";
    } else {

        $error = "No se ha podido eliminar el contacto";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar contacto</title>
</head>

<body>

    <h1>Eliminar contacto</h1>

    <!-- Formulario para buscar el contacto -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

        <fieldset>
            <legend>Buscar contacto</legend>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required
                value="<?= htmlspecialchars($dni) ?>">

            <input type="submit" name="buscar" value="Buscar contacto">

        </fieldset>

    </form>

    <br>

    <?php if ($contactoEncontrado) { ?>

        <h2>Datos del contacto</h2>

        //no recorrer porque ya ha encontrado el contacto
        <p>Nombre: <?= htmlspecialchars($contacto["nombre"]) ?></p>
        <p>DNI: <?= htmlspecialchars($contacto["DNI"]) ?></p>
        <p>Teléfono: <?= htmlspecialchars($contacto["telefono"]) ?></p>
        <p>Email: <?= htmlspecialchars($contacto["email"]) ?></p>

        <p>¿Estás seguro de que quieres eliminar este contacto?</p>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

            <input type="hidden" name="dni"
                value="<?= htmlspecialchars($dni) ?>">
            //crea un campo que el usuario no ve en la página
            /*Cuando pulsamos «Sí, eliminar», necesitamos enviar otra vez el DNI para que PHP sepa qué contacto tiene que borrar.
            El campo oculto permite enviar ese DNI sin tener que pedirle al usuario que lo escriba otra vez. */


            <button type="submit" name="confirmar">Sí, eliminar</button>

        </form>

    <?php } ?>

    <p><?= htmlspecialchars($error) ?></p>
    <p><?= htmlspecialchars($mensaje) ?></p>

    <br>

    <a href="agenda.php">Volver a la agenda</a>

</body>

</html>