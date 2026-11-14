
<?php

session_start();

require_once "funciones.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Comprobar que el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

// Comprobar que se ha recibido una opción
if (!isset($_POST["enviado"])) {
    header("Location: agenda.php");
    exit();
}

// Recoger la opción seleccionada
$opcion = $_POST["enviado"];

// Elegir la operación
switch ($opcion) {

    case "1":

        header("Location: insertar.php");
        exit();

    case "2":


        header("Location: consultar.php");
        exit();

    case "3":
        if ($_SESSION["tipo"] != "administrador") {
            exit("No tienes permiso para modificar contactos");
        }

        header("Location: modificar.php");
        exit();

    case "4":
        if ($_SESSION["tipo"] != "administrador") {
            exit("No tienes permiso para eliminar contactos");
        }

        header("Location: eliminar.php");
        exit();

    default:
        echo "Opción no válida";
        break;
}
?>