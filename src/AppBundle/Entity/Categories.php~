<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Programme", mappedBy="categorie")
     */

    private $programme;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Creneau", mappedBy="categorie")
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
     * @var string
     *
     * @ORM\Column(name="cate_libelle", type="string", length=255)
     */
    private $cateLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="cate_video", type="string", length=255)
     */
    private $cateVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="cate_synthe", type="string", length=255)
     */
    private $cateSynthe;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Categories
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->programmes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add programme
     *
     * @param \AppBundle\Entity\Programmes $programme
     *
     * @return Categories
     */
    public function addProgramme(\AppBundle\Entity\Programmes $programme)
    {
        $this->programmes[] = $programme;

        return $this;
    }

    /**
     * Remove programme
     *
     * @param \AppBundle\Entity\Programmes $programme
     */
    public function removeProgramme(\AppBundle\Entity\Programmes $programme)
    {
        $this->programmes->removeElement($programme);
    }

    /**
     * Get programmes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProgrammes()
    {
        return $this->programmes;
    }

    /**
     * Add creneaux
     *
     * @param \AppBundle\Entity\Creneau $creneaux
     *
     * @return Categories
     */
    public function addCreneaux(\AppBundle\Entity\Creneau $creneaux)
    {
        $this->creneaux[] = $creneaux;

        return $this;
    }

    /**
     * Remove creneaux
     *
     * @param \AppBundle\Entity\Creneau $creneaux
     */
    public function removeCreneaux(\AppBundle\Entity\Creneau $creneaux)
    {
        $this->creneaux->removeElement($creneaux);
    }

    /**
     * Get creneaux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneaux()
    {
        return $this->creneaux;
    }

    /**
     * Add creneau
     *
     * @param \AppBundle\Entity\Creneau $creneau
     *
     * @return Categories
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

    /**
     * Set cateLibelle
     *
     * @param string $cateLibelle
     *
     * @return Categories
     */
    public function setCateLibelle($cateLibelle)
    {
        $this->cateLibelle = $cateLibelle;

        return $this;
    }

    /**
     * Get cateLibelle
     *
     * @return string
     */
    public function getCateLibelle()
    {
        return $this->cateLibelle;
    }

    /**
     * Set cateVideo
     *
     * @param string $cateVideo
     *
     * @return Categories
     */
    public function setCateVideo($cateVideo)
    {
        $this->cateVideo = $cateVideo;

        return $this;
    }

    /**
     * Get cateVideo
     *
     * @return string
     */
    public function getCateVideo()
    {
        return $this->cateVideo;
    }

    /**
     * Set cateSynthe
     *
     * @param string $cateSynthe
     *
     * @return Categories
     */
    public function setCateSynthe($cateSynthe)
    {
        $this->cateSynthe = $cateSynthe;

        return $this;
    }

    /**
     * Get cateSynthe
     *
     * @return string
     */
    public function getCateSynthe()
    {
        return $this->cateSynthe;
    }

    /**
     * Get programme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProgramme()
    {
        return $this->programme;
    }
}
