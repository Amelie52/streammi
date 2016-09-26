<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grilles
 *
 * @ORM\Table(name="grilles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GrillesRepository")
 */
class Grilles
{
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programmes")
     */

    private $programmes;

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
     * @ORM\Column(name="creneaudbt", type="time")
     */
    private $creneaudbt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creneaufin", type="time")
     */
    private $creneaufin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date")
     */
    private $jour;


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
     * Set creneaudbt
     *
     * @param \DateTime $creneaudbt
     *
     * @return Grilles
     */
    public function setCreneaudbt($creneaudbt)
    {
        $this->creneaudbt = $creneaudbt;

        return $this;
    }

    /**
     * Get creneaudbt
     *
     * @return \DateTime
     */
    public function getCreneaudbt()
    {
        return $this->creneaudbt;
    }

    /**
     * Set creneaufin
     *
     * @param \DateTime $creneaufin
     *
     * @return Grilles
     */
    public function setCreneaufin($creneaufin)
    {
        $this->creneaufin = $creneaufin;

        return $this;
    }

    /**
     * Get creneaufin
     *
     * @return \DateTime
     */
    public function getCreneaufin()
    {
        return $this->creneaufin;
    }

    /**
     * Set jour
     *
     * @param \DateTime $jour
     *
     * @return Grilles
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \DateTime
     */
    public function getJour()
    {
        return $this->jour;
    }
}
