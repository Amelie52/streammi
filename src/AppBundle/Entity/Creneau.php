<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreneauRepository")
 */
class Creneau
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Creneau_Programme", mappedBy="creneau")
     */

    private $creneau_programme;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories", inversedBy="creneau")
     */

    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grille", inversedBy="creneau")
     */

    private $grille;



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
     * @ORM\Column(name="creneau_dbt", type="time")
     */
    private $creneauDbt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creneau_fin", type="time")
     */
    private $creneauFin;


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
     * Set creneauDbt
     *
     * @param \DateTime $creneauDbt
     *
     * @return Creneau
     */
    public function setCreneauDbt($creneauDbt)
    {
        $this->creneauDbt = $creneauDbt;

        return $this;
    }

    /**
     * Get creneauDbt
     *
     * @return \DateTime
     */
    public function getCreneauDbt()
    {
        return $this->creneauDbt;
    }

    /**
     * Set creneauFin
     *
     * @param \DateTime $creneauFin
     *
     * @return Creneau
     */
    public function setCreneauFin($creneauFin)
    {
        $this->creneauFin = $creneauFin;

        return $this;
    }

    /**
     * Get creneauFin
     *
     * @return \DateTime
     */
    public function getCreneauFin()
    {
        return $this->creneauFin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneau_programme = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creneauProgramme
     *
     * @param \AppBundle\Entity\Creneau_Programme $creneauProgramme
     *
     * @return Creneau
     */
    public function addCreneauProgramme(\AppBundle\Entity\Creneau_Programme $creneauProgramme)
    {
        $this->creneau_programme[] = $creneauProgramme;

        return $this;
    }

    /**
     * Get creneauProgramme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneauProgramme()
    {
        return $this->creneau_programme;
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categories $categorie
     *
     * @return Creneau
     */
    public function setCategorie(\AppBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set grille
     *
     * @param \AppBundle\Entity\Grilles $grille
     *
     * @return Creneau
     */
    public function setGrille(\AppBundle\Entity\Grilles $grille = null)
    {
        $this->grille = $grille;

        return $this;
    }

    /**
     * Get grille
     *
     * @return \AppBundle\Entity\Grilles
     */
    public function getGrille()
    {
        return $this->grille;
    }

    /**
     * Remove creneauProgramme
     *
     * @param \AppBundle\Entity\Creneau_Programme $creneauProgramme
     */
    public function removeCreneauProgramme(\AppBundle\Entity\Creneau_Programme $creneauProgramme)
    {
        $this->creneau_programme->removeElement($creneauProgramme);
    }
}