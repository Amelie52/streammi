<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Grille;
use AppBundle\Form\GrilleType;
use AppBundle\Entity\Creneau;
use AppBundle\Form\CreneauType;

/**
 * Default controller.
 *
 * @Route("/admin/home")
 */
class DefaultController extends Controller
{
    /**
     * Lists all Grille entities.
     *
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $grilles = $em->getRepository('AppBundle:Grille')->findAll();

        return $this->render('default/index.html.twig', array(
            'grilles' => $grilles,
        ));

        $creneaus = $em->getRepository('AppBundle:Creneau')->findAll();

        return $this->render('default/index.html.twig', array(
            'creneaus' => $creneaus,
        ));

    }

}
