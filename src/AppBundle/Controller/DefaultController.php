<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Categories;

class DefaultController extends Controller
{

    /**
     * @route("/page2", name="page2")
     */

    public function pageAction()
    {
        //replace this example code
        return $this->render('default/page.html.twig');
    }

    /**
     * @route("/page3", name="page3")
     */


   /* public function createAction(){
       $categories = new Categories();
        $categories->setLibelle('Culture générale');

        $em = $this->getDoctrine()->getManager();
        $em->persist($categories);

        $em->flush();

        return $this->render('default/page.html.twig');

    }*/



}
