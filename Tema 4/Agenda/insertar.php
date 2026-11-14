<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "funciones.php";
// tambien incluye clase Contacto,archivo y por tanto contactos.json

$error = "";
$mensaje = "";

// Comprobar que el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Recuperar los datos enviados por POST.
// Si no existen, asignar valores vacíos.

$nombre = $_POST["nombre"] ?? "";
$dni = $_POST["dni"] ?? "";
$telefono = $_POST["telefono"] ?? "";
$email = $_POST["email"] ?? "";

// Comprobar si se ha enviado el formulario
if (isset($_POST["enviar"])) {

    // Validar que los campos obligatorios no estén vacíos
    if (
        empty(trim($nombre)) || empty(trim($dni)) || empty(trim($telefono)) || empty(trim($email))
    ) {

        $error = "Todos los campos son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Validar el formato del correo electrónico
        $error = "El correo electrónico no es válido";
    } else {

        // Crear un objeto de la clase Contacto
        $nuevoContacto = new Contacto($nombre, $dni, $telefono, $email);

        // Leer los contactos que ya existen
        $contactos = leerContactos($archivo);

        // Intentar insertar el nuevo contacto
        if (insertarContacto($contactos, $nuevoContacto, $archivo)) {

            $mensaje = "Contacto insertado correctamente";

            // Limpiar los campos después de insertar
            $nombre = "";
            $dni = "";
            $telefono = "";
            $email = "";
        } else {
            $error = "El DNI ya existe o ha ocurrido un error al guardar";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar contacto</title>
</head>

<body>

    <main>

        <h1>Insertar nuevo contacto</h1>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

            <fieldset>
                <legend>Información del contacto</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required
                    value="<?= htmlspecialchars($nombre) ?>">

                <br><br>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required
                    value="<?= htmlspecialchars($dni) ?>">

                <br><br>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required
                    value="<?= htmlspecialchars($telefono) ?>">

                <br><br>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required
                    value="<?= htmlspecialchars($email) ?>">

                <br><br>

            </fieldset>

            <br>

            <input type="submit" name="enviar" value="Guardar contacto">
            <input type="reset" value="Borrar">

        </form>

        <p><?= htmlspecialchars($error) ?></p>
        <p><?= htmlspecialchars($mensaje) ?></p>

        <a href="agenda.php">Volver a la agenda</a>

    </main>

</body>

</html>