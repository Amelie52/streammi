<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grille
 *
 * @ORM\Table(name="grille")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GrilleRepository")
 */
class Grille
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Creneau", mappedBy="grille")
     * @ORM\OrderBy({"creneauDbt"="ASC"})
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
     * @var \DateTime
     *
     * @ORM\Column(name="grille_date", type="datetime")
     */
    private $grilleDate;


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
     * Set grilleDate
     *
     * @param \DateTime $grilleDate
     *
     * @return Grille
     */
    public function setGrilleDate($grilleDate)
    {
        $this->grilleDate = $grilleDate;

        return $this;
    }

    /**
     * toString
     * @return string
     */
    public function __toString(){

        return $this->grilleDate->format('d/m/Y');
    }

    /**
     * Get grilleDate
     *
     * @return \DateTime
     */
    public function getGrilleDate()
    {
        return $this->grilleDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneau = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add creneau
     *
     * @param \AppBundle\Entity\Creneau $creneau
     *
     * @return Grille
     */
    public function addCreneau(\AppBundle\Entity\Creneau $creneau)
    {
        $this->creneau[] = $creneau;

        return $this;
    }

    /**
     * Remove creneau
     *
     * @param \AppBundle\Entity\Creneau $creneau
     */
    public function removeCreneau(\AppBundle\Entity\Creneau $creneau)
    {
        $this->creneau->removeElement($creneau);
    }

    /**
     * Get creneau
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneau()
    {
        return $this->creneau;
    }
}
