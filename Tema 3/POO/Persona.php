
<?php

class Persona
{
    private $DNI;
    private $nombre;
    private $email;

    public function __construct($DNI, $nombre, $email)
    {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getDNI()
    {
        return $this->DNI;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function Mostrar()
    {
        echo "<p>" . $this->DNI . "-" . $this->nombre . "-" . $this->email . "</p>";
    }
}

?>
