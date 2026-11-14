
<?php

require_once "contacto.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);


$archivo = "contactos.json";


// LEER CONTACTOS
function leerContactos($archivo)
{
    if (file_exists($archivo)) {

        $contenido = file_get_contents($archivo);

        $contactos = json_decode($contenido, true);
        //convierte el contenido JSON en un array PHP
        /*true->los datos los convierte en array
        false->convierte los datos en objetos*/

        if (is_array($contactos)) {
            return $contactos; //donde la funcion ha sido llamada en el crud
        }
        //comprobar que se ha convertido en array (boolean)

    }

    return []; //si no es un array devuelve un array vacio
}


// GUARDAR CONTACTOS
//cuando se inserta o modifica o se elimina un contacto
function guardarContactos($contactos, $archivo) //array y donde guardarlo
{
    $datosJSON = json_encode($contactos);
    //convierte el array PHP en JSON

    return file_put_contents($archivo, $datosJSON) !== false;
    //donde guardar y qué escribir
    //si es diferente de false se han escrito
}


// BUSCAR CONTACTO POR DNI
function buscarContacto($contactos, $dni) //dni introducido por el usuario
{
    foreach ($contactos as $contacto) {

        if ($contacto["DNI"] == $dni) {
            return $contacto; //usuario encontrado
        }
    }

    return false; //usuario no encontrado
}


// INSERTAR CONTACTO
function insertarContacto($contactos, $nuevoContacto, $archivo)
/*array con los contactos que ya existen
 nuevo contacto de la clase Contacto
donde guardar*/

{
    if (buscarContacto($contactos, $nuevoContacto->getDNI()) !== false) {
        return false;
    }
    //llama a funcion buscarContacto
    //comprobar que el usuario a insertar no existe
    //si devuelve true existe y cancela la insercion con return false

    $contactos[] = [
        "nombre" => $nuevoContacto->getNombre(),
        "DNI" => $nuevoContacto->getDNI(),
        "telefono" => $nuevoContacto->getTelefono(),
        "email" => $nuevoContacto->getEmail()
    ];
    //añade otro contacto al final del array existente

    return guardarContactos($contactos, $archivo);
}


// MODIFICAR CONTACTO
function modificarContacto($contactos, $dni, $nombre, $telefono, $email, $archivo)
{
    /*recibe el array existente
    campos del usuario 
    donde guardar los cambios*/

    foreach ($contactos as $indice => $contacto) {

        if ($contacto["DNI"] == $dni) {

            $contactos[$indice]["nombre"] = $nombre;
            $contactos[$indice]["telefono"] = $telefono;
            $contactos[$indice]["email"] = $email;

            //sustituir directamente los valores antiguos dentro del array

            return guardarContactos($contactos, $archivo);
        }
    }

    return false; //si no encuentra usuario con ese dni cancela la operacion con return false
}


//  ELIMINAR CONTACTO
function eliminarContacto($contactos, $dni, $archivo)
/*recibe array existente
dni del usuario
donde guardar los cambios*/

{
    foreach ($contactos as $indice => $contacto) {

        if ($contacto["DNI"] == $dni) {

            unset($contactos[$indice]);

            $contactos = array_values($contactos);
            //reorganizar los índices para que vuelvan a empezar desde 0

            return guardarContactos($contactos, $archivo);
        }
    }

    return false; //si no encuentra usuario con ese dni cancela la operacion con return false
}
