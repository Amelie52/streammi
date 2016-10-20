<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="programme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgrammeRepository")
 */
class Programme
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Creneau_programme", mappedBy="programme", cascade={"remove"})
     */

    private $creneau_programme;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories", inversedBy="programme")
     */

    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prog_titre", type="string", length=255)
     */
    private $progTitre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prog_duree", type="time")
     */
    private $progDuree;

    /**
     * @var string
     *
     * @ORM\Column(name="prog_url", type="string", length=255)
     */
    private $progUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="prog_minia", type="string", length=255)
     */
    private $progMinia;


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
     * Set progTitre
     *
     * @param string $progTitre
     *
     * @return Programme
     */
    public function setProgTitre($progTitre)
    {
        $this->progTitre = $progTitre;

        return $this;
    }

    /**
     * Get progTitre
     *
     * @return string
     */
    public function getProgTitre()
    {
        return $this->progTitre;
    }

    /**
     * Set progDuree
     *
     * @param \DateTime $progDuree
     *
     * @return Programme
     */
    public function setProgDuree($progDuree)
    {
        $this->progDuree = $progDuree;

        return $this;
    }

    /**
     * Get progDuree
     *
     * @return \DateTime
     */
    public function getProgDuree()
    {
        return $this->progDuree;
    }

    /**
     * Set progUrl
     *
     * @param string $progUrl
     *
     * @return Programme
     */
    public function setProgUrl($progUrl)
    {
        $this->progUrl = $progUrl;

        return $this;
    }

    /**
     * Get progUrl
     *
     * @return string
     */
    public function getProgUrl()
    {
        return $this->progUrl;
    }

    /**
     * Set progMinia
     *
     * @param string $progMinia
     *
     * @return Programme
     */
    public function setProgMinia($progMinia)
    {
        $this->progMinia = $progMinia;

        return $this;
    }

    /**
     * Get progMinia
     *
     * @return string
     */
    public function getProgMinia()
    {
        return $this->progMinia;
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
     * @param \AppBundle\Entity\Creneau_programme $creneauProgramme
     *
     * @return Programme
     */
    public function addCreneauProgramme(\AppBundle\Entity\Creneau_programme $creneauProgramme)
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
     * @return Programme
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
     * Remove creneauProgramme
     *
     * @param \AppBundle\Entity\Creneau_programme $creneauProgramme
     */
    public function removeCreneauProgramme(\AppBundle\Entity\Creneau_programme $creneauProgramme)
    {
        $this->creneau_programme->removeElement($creneauProgramme);
    }
}
