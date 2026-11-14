<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "funciones.php";


// Comprobar que el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Leer los contactos del archivo JSON
$contactos = leerContactos($archivo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar contactos</title>
</head>

<body>

    <h1>Lista de contactos</h1>

    <?php if (empty($contactos)) { ?>

        <p>No hay contactos guardados.</p>

    <?php } else { ?>

        <table border="1">

            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>

            <?php foreach ($contactos as $contacto) { ?>

                <tr>
                    <td><?= htmlspecialchars($contacto["nombre"]) ?></td>
                    <td><?= htmlspecialchars($contacto["DNI"]) ?></td>
                    <td><?= htmlspecialchars($contacto["telefono"]) ?></td>
                    <td><?= htmlspecialchars($contacto["email"]) ?></td>
                </tr>

            <?php } ?>

        </table>

    <?php } ?>

    <br>

    <a href="agenda.php">Volver a la agenda</a>

</body>

</html>