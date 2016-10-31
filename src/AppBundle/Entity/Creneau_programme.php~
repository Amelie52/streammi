<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau_programme
 *
 * @ORM\Table(name="creneau_programme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Creneau_programmeRepository")
 */
class Creneau_programme
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Programme", inversedBy="creneau_programme")
     */

    private $programme;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Creneau", inversedBy="creneau_programme")
     */

    private $creneau;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="prog_ordre", type="integer")
     */
    private $progOrdre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set progOrdre
     *
     * @param integer $progOrdre
     *
     * @return Creneau_programme
     */
    public function setProgOrdre($progOrdre)
    {
        $this->progOrdre = $progOrdre;

        return $this;
    }

    /**
     * Get progOrdre
     *
     * @return int
     */
    public function getProgOrdre()
    {
        return $this->progOrdre;
    }

    /**
     * Set programme
     *
     * @param \AppBundle\Entity\Programme $programme
     *
     * @return Creneau_programme
     */
    public function setProgramme(\AppBundle\Entity\Programme $programme = null)
    {
        $this->programme = $programme;

        return $this;
    }

    /**
     * Get programme
     *
     * @return \AppBundle\Entity\Programme
     */
    public function getProgramme()
    {
        return $this->programme;
    }

    /**
     * Set creneau
     *
     * @param \AppBundle\Entity\Creneau $creneau
     *
     * @return Creneau_programme
     */
    public function setCreneau(\AppBundle\Entity\Creneau $creneau = null)
    {
        $this->creneau = $creneau;

        return $this;
    }

    /**
     * Get creneau
     *
     * @return \AppBundle\Entity\Creneau
     */
    public function getCreneau()
    {
        return $this->creneau;
    }
}
