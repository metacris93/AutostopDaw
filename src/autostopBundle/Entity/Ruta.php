<?php

namespace autostopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use autostopBundle\Entity\Estudiante;
/**
 * Ruta
 *
 * @ORM\Table(name="ruta", indexes={@ORM\Index(name="IDX_639C5FB2B9CB2147", columns={"idEstudiante"})})
 * @ORM\Entity
 */
class Ruta
{
    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255, nullable=false)
     */
    private $estado;
    
    /**
     * @var string
     *
     * @ORM\Column(name="puntosx", type="string", length=255, nullable=false)
     */
    private $puntosx;
    
    /**
     * @var string
     *
     * @ORM\Column(name="puntosy", type="string", length=255, nullable=false)
     */
    private $puntosy;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="capacidad", type="integer", nullable=false)
     */
    private $capacidad;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fechaInicio", type="date", nullable=false)
     */
    private $fechainicio;
    
    /**
     * @var \Time
     *
     * @ORM\Column(name="horaInicio", type="time", nullable=false)
     */
    private $horainicio;
    
    /**
     * @var float
     *
     * @ORM\Column(name="costo", type="float", precision=10, scale=0, nullable=false)
     */
    private $costo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \autostopBundle\Entity\Estudiante
     *
     * @ORM\ManyToOne(targetEntity="autostopBundle\Entity\Estudiante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEstudiante", referencedColumnName="id")
     * })
     */
    private $idestudiante;

    function __construct($estado, $capacidad, $fecha, $hora, $costo) {
        $this->costo = $costo;
        $this->capacidad = $capacidad;
        $this->estado = $estado;
        $this->fechainicio = $fecha;
        $this->horainicio = $hora;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Ruta
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     * @return Ruta
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return integer 
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set fechainicio
     *
     * @param \Date $fechainicio
     * @return Ruta
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \Date 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set costo
     *
     * @param float $costo
     * @return Ruta
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return float 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idestudiante
     *
     * @param \autostopBundle\Entity\Estudiante $idestudiante
     * @return Ruta
     */
    public function setIdestudiante(Estudiante $idestudiante = null)
    {
        $this->idestudiante = $idestudiante;

        return $this;
    }

    /**
     * Get idestudiante
     *
     * @return \autostopBundle\Entity\Estudiante 
     */
    public function getIdestudiante()
    {
        return $this->idestudiante;
    }

    /**
     * Set puntosx
     *
     * @param string $puntosx
     * @return Ruta
     */
    public function setPuntosx($puntosx)
    {
        $this->puntosx = $puntosx;

        return $this;
    }

    /**
     * Get puntosx
     *
     * @return string 
     */
    public function getPuntosx()
    {
        return $this->puntosx;
    }

    /**
     * Set puntosy
     *
     * @param string $puntosy
     * @return Ruta
     */
    public function setPuntosy($puntosy)
    {
        $this->puntosy = $puntosy;

        return $this;
    }

    /**
     * Get puntosy
     *
     * @return string 
     */
    public function getPuntosy()
    {
        return $this->puntosy;
    }

    /**
     * Set horainicio
     *
     * @param \DateTime $horainicio
     * @return Ruta
     */
    public function setHorainicio($horainicio)
    {
        $this->horainicio = $horainicio;

        return $this;
    }

    /**
     * Get horainicio
     *
     * @return \DateTime 
     */
    public function getHorainicio()
    {
        return $this->horainicio;
    }
}
