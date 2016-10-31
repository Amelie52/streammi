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
use AppBundle\Entity\Programme;
use AppBundle\Form\ProgrammeType;
use AppBundle\Entity\Categories;
use AppBundle\Form\CategoriesType;
use AppBundle\Entity\Creneau_programme;


/**
 * Default controller.
 *
 * @Route("/admin")
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

    }

    /**
     * Finds and displays a Creneau entity.
     *
     * @Route("/creneau/{id}", name="creneau_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);

        $programme = new Programme();
        $form = $this->createForm('AppBundle\Form\ProgrammeType', $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programme);


            $creneau = $em->getRepository('AppBundle\Entity\Creneau')->find($request->request->get('creneau'));

            $c_ps = $this->getDoctrine()->getRepository('AppBundle:Creneau_programme')->findBy(array('creneau' => $creneau->getId()), array('progOrdre' => 'ASC'));
            $last = 0;
            foreach ($c_ps as $cps)
            {
                $last = $cps->getProgOrdre();
            }
            $last++;

            $c_p = new Creneau_programme();
            $c_p->setCreneau($creneau);
            $c_p->setProgOrdre($last);
            $c_p->setProgramme($programme);

            $em->persist($c_p);

            //$programme->addCreneauProgramme($c_p);
            //$em->persist($programme);

            $em->flush();

            return $this->redirectToRoute('programme_show', array('id' => $programme->getId()));
        }

        return $this->render('default/creneau.html.twig', array(
            'creneau' => $creneau,
            'delete_form' => $deleteForm->createView(),
            'programme' => $programme,
            'creneaux' => $this->getDoctrine()->getRepository('AppBundle:Creneau')->findBy(array('id' => $creneau->getId())),
            'form' => $form->createView(),
        ));
    }

//    rajouter !

    /**
     * Creates a new Programme entity.
     *
     * @Route("/creneau/{id}", name="programme_new")
     * @Method({"GET", "POST"})
     */
   /* public function newAction(Request $request)
    {
        $programme = new Programme();
        $form = $this->createForm('AppBundle\Form\ProgrammeType', $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programme);


            $creneau = $em->getRepository('AppBundle\Entity\Creneau')->find($request->request->get('creneau'));

            $c_ps = $this->getDoctrine()->getRepository('AppBundle:Creneau_programme')->findBy(array('creneau' => $creneau->getId()), array('progOrdre' => 'ASC'));
            $last = 0;
            foreach ($c_ps as $cps)
            {
                $last = $cps->getProgOrdre();
            }
            $last++;

            $c_p = new Creneau_programme();
            $c_p->setCreneau($creneau);
            $c_p->setProgOrdre($last);
            $c_p->setProgramme($programme);

            $em->persist($c_p);

            //$programme->addCreneauProgramme($c_p);
            //$em->persist($programme);

            $em->flush();

            return $this->redirectToRoute('programme_show', array('id' => $programme->getId()));
        }

        return $this->render('default/creneau.html.twig', array(
            'programme' => $programme,
            'creneaux' => $this->getDoctrine()->getRepository('AppBundle:Creneau')->findAll(),
            'form' => $form->createView(),
        ));
    }*/


// fin rajout

    /**
     * Deletes a Creneau entity.
     *
     * @Route("/creneau/{id}", name="creneau_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Creneau $creneau)
    {
        $form = $this->createDeleteForm($creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creneau);
            $em->flush();
        }

        return $this->redirectToRoute('index');
    }

    /**
     * Creates a form to delete a Creneau entity.
     *
     * @param Creneau $creneau The Creneau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Creneau $creneau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creneau_delete', array('id' => $creneau->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

//    /**
//     * Lists all Categories entities.
//     *
//     * @Route("/categories/", name="categories_index")
//     * @Method("GET")
//     */
//    public function cateIndexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $categories = $em->getRepository('AppBundle:Categories')->findAll();
//
//        return $this->render('default/categories.html.twig', array(
//            'categories' => $categories,
//
//        ));
//    }

}
