
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <?php
    require_once "Estudiante.php";

    $persona1 = new Persona("25986354R", "Isa", "isa@mail.com");
    $estudiante1 = new Estudiante("25489635Q", "Alex", "alex@mail.com", "15687");

    $persona1->setDNI("45872036P");
    $estudiante1->setNumExpediente("45840");

    $persona1->Mostrar();
    $estudiante1->Mostrar();
    ?>
</body>
</html>
