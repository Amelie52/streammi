<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdminRepository")
 */
class Admin
{
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
     * @ORM\Column(name="admin_pseudo", type="string", length=255)
     */
    private $adminPseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_mdp", type="string", length=255)
     */
    private $adminMdp;


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
     * Set adminPseudo
     *
     * @param string $adminPseudo
     *
     * @return Admin
     */
    public function setAdminPseudo($adminPseudo)
    {
        $this->adminPseudo = $adminPseudo;

        return $this;
    }

    /**
     * Get adminPseudo
     *
     * @return string
     */
    public function getAdminPseudo()
    {
        return $this->adminPseudo;
    }

    /**
     * Set adminMdp
     *
     * @param string $adminMdp
     *
     * @return Admin
     */
    public function setAdminMdp($adminMdp)
    {
        $this->adminMdp = $adminMdp;

        return $this;
    }

    /**
     * Get adminMdp
     *
     * @return string
     */
    public function getAdminMdp()
    {
        return $this->adminMdp;
    }
}
