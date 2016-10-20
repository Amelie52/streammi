<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Creneau;
use AppBundle\Form\CreneauType;


/**
 * Creneau controller.
 *
 * @Route("/admin/creneau")
 */
class CreneauController extends Controller
{
    /**
     * Lists all Creneau entities.
     *
     * @Route("/", name="creneau_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $creneaus = $em->getRepository('AppBundle:Creneau')->findBy(array(), array('creneauDbt' => 'ASC')); // on l'utilise pas dans le projet

        return $this->render('creneau/index.html.twig', array(
            'creneaus' => $creneaus,
        ));
    }

    /**
     * Creates a new Creneau entity.
     *
     * @Route("/new", name="creneau_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $creneau = new Creneau();
        $form = $this->createForm('AppBundle\Form\CreneauType', $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneau);
            $em->flush();

            return $this->redirectToRoute('creneau_show', array('id' => $creneau->getId()));
        }

        return $this->render('creneau/new.html.twig', array(
            'creneau' => $creneau,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Creneau entity.
     *
     * @Route("/{id}", name="creneau_show")
     * @Method("GET")
     */
    public function showAction(Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);

        return $this->render('creneau/show.html.twig', array(
            'creneau' => $creneau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Creneau entity.
     *
     * @Route("/{id}/edit", name="creneau_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);
        $editForm = $this->createForm('AppBundle\Form\CreneauType', $creneau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneau);
            $em->flush();

            return $this->redirectToRoute('creneau_edit', array('id' => $creneau->getId()));
        }

        return $this->render('creneau/edit.html.twig', array(
            'creneau' => $creneau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Creneau entity.
     *
     * @Route("/{id}", name="creneau_delete")
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
}
