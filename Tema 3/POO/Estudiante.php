
<?php

require_once "Persona.php";

class Estudiante extends Persona
{
    private $numExpediente;

    public function __construct($DNI, $nombre, $email, $numExpediente)
    {
        parent::__construct($DNI, $nombre, $email);
        $this->numExpediente = $numExpediente;
    }

    public function getNumExpediente()
    {
        return $this->numExpediente;
    }

    public function setNumExpediente($numExpediente)
    {
        $this->numExpediente = $numExpediente;
    }

    public function Mostrar()
    {
        parent::Mostrar();
        echo "<p>NumExpediente: " . $this->getNumExpediente() . "</p>";
    }
}

?>
