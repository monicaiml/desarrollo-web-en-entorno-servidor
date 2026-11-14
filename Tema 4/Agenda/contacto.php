<?php



class Contacto
{
    private string $nombre;
    private string $DNI;
    private string $telefono;
    private string $email;

    public function __construct(string $nombre, string $DNI, string $telefono, string $email)
    {
        $this->nombre = $nombre;
        $this->DNI = $DNI;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDNI()
    {
        return $this->DNI;
    }

    public function setDNI(string $DNI)
    {
        $this->DNI = $DNI;
        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
}
