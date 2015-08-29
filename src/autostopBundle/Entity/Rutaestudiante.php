<?php

namespace autostopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use autostopBundle\Entity\Estudiante;
use autostopBundle\Entity\Ruta;
/**
 * Rutaestudiante
 *
 * @ORM\Table(name="rutaestudiante", indexes={@ORM\Index(name="IDX_91FB1E18B053AE12", columns={"idRuta"}), @ORM\Index(name="IDX_91FB1E18B9CB2147", columns={"idEstudiante"})})
 * @ORM\Entity
 */
class Rutaestudiante
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

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
     * @var \autostopBundle\Entity\Ruta
     *
     * @ORM\ManyToOne(targetEntity="autostopBundle\Entity\Ruta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRuta", referencedColumnName="id")
     * })
     */
    private $idruta;



    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Rutaestudiante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
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
     * @return Rutaestudiante
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
     * Set idruta
     *
     * @param \autostopBundle\Entity\Ruta $idruta
     * @return Rutaestudiante
     */
    public function setIdruta( $idruta = null)
    {
        $this->idruta = $idruta;

        return $this;
    }

    /**
     * Get idruta
     *
     * @return \autostopBundle\Entity\Ruta 
     */
    public function getIdruta()
    {
        return $this->idruta;
    }
}
