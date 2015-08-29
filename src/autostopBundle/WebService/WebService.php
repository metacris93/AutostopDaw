<?php
namespace autostopBundle\WebService;

class WebService{
    
    private $nombres;
    private $apellidos;
    private $sexo;
    private $correo;
    
    function __construct() {
        
    }
    public function verificarUsuario($usuario){
        $cliente = new \SoapClient('http://ws.espol.edu.ec/saac/wsandroid.asmx?wsdl');
        $resultado = $cliente->wsInfoUsuario(array("usuario"=>$usuario));
        $xml = new \SimpleXMLElement($resultado->wsInfoUsuarioResult->any);
        $datos = ((array)$xml->NewDataSet->INFORMACIONUSUARIO);
        if(isset($datos)){
            $this->setNombres($datos['NOMBRES']);
            $this->setApellidos($datos['APELLIDOS']);
            $this->setSexo($datos['SEXO']);
            $this->setCorreo($usuario."@espol.edu.ec");
            return 1;            
        }else{
            return 0;
        }
    }
    public function setNombres($nombres){
        $this->nombres = $nombres;
    }
    
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getNombres(){
        return $this->nombres;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    
    public function getApellidos(){
        return $this->apellidos;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
}

