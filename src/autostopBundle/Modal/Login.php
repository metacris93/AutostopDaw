<?php
namespace autostopBundle\Modal;

class Login{
    //private $id;
    private $username;
    private $nombre;
    private $apellido;
    private $sexo;
    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     * @return User
     */
    public function setUsername($nombreUsuario){
        $this->username = $nombreUsuario;
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getSexo()
    {
        return $this->sexo;
    }
    
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
}

