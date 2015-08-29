<?php

namespace autostopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use autostopBundle\Entity\Estudiante;
/**
 * Mensaje
 *
 * @ORM\Table(name="mensaje", indexes={@ORM\Index(name="IDX_54DE249DA7BF2DD4", columns={"idEmisor"}), @ORM\Index(name="IDX_54DE249DBA61823C", columns={"idReceptor"})})
 * @ORM\Entity
 */
class Mensaje
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text", nullable=true)
     */
    private $contenido;

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
     *   @ORM\JoinColumn(name="idReceptor", referencedColumnName="id")
     * })
     */
    private $idreceptor;

    /**
     * @var \autostopBundle\Entity\Estudiante
     *
     * @ORM\ManyToOne(targetEntity="autostopBundle\Entity\Estudiante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmisor", referencedColumnName="id")
     * })
     */
    private $idemisor;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Mensaje
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Mensaje
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
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
     * Set idreceptor
     *
     * @param \autostopBundle\Entity\Estudiante $idreceptor
     * @return Mensaje
     */
    public function setIdreceptor(Estudiante $idreceptor = null)
    {
        $this->idreceptor = $idreceptor;

        return $this;
    }

    /**
     * Get idreceptor
     *
     * @return \autostopBundle\Entity\Estudiante 
     */
    public function getIdreceptor()
    {
        return $this->idreceptor;
    }

    /**
     * Set idemisor
     *
     * @param \autostopBundle\Entity\Estudiante $idemisor
     * @return Mensaje
     */
    public function setIdemisor(Estudiante $idemisor = null)
    {
        $this->idemisor = $idemisor;

        return $this;
    }

    /**
     * Get idemisor
     *
     * @return \autostopBundle\Entity\Estudiante 
     */
    public function getIdemisor()
    {
        return $this->idemisor;
    }
}
