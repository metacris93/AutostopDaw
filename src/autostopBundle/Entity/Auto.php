<?php

namespace autostopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use autostopBundle\Entity\Estudiante;
/**
 * Auto
 *
 * @ORM\Table(name="auto", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C6888AC4B9CB2147", columns={"idEstudiante"})})
 * @ORM\Entity
 */
class Auto
{
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=15, nullable=false)
     */
    private $marca;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacidad", type="integer", nullable=false)
     */
    private $capacidad;

    /**
     * @var string
     *
     * @ORM\Column(name="placa", type="string", length=8, nullable=false)
     */
    private $placa;

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



    /**
     * Set marca
     *
     * @param string $marca
     * @return Auto
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     * @return Auto
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
     * Set placa
     *
     * @param string $placa
     * @return Auto
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string 
     */
    public function getPlaca()
    {
        return $this->placa;
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
     * @return Auto
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
}
