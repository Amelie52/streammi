<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Grille;
use AppBundle\Form\GrilleType;

/**
 * Grille controller.
 *
 * @Route("/admin/grille")
 */
class GrilleController extends Controller
{
    /**
     * Lists all Grille entities.
     *
     * @Route("/", name="grille_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $grilles = $em->getRepository('AppBundle:Grille')->findAll();

        return $this->render('grille/index.html.twig', array(
            'grilles' => $grilles,
        ));

    }

    /**
     * Creates a new Grille entity.
     *
     * @Route("/new", name="grille_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $grille = new Grille();
        $form = $this->createForm('AppBundle\Form\GrilleType', $grille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grille);
            $em->flush();

            return $this->redirectToRoute('grille_show', array('id' => $grille->getId()));
        }

        return $this->render('grille/new.html.twig', array(
            'grille' => $grille,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Grille entity.
     *
     * @Route("/{id}", name="grille_show")
     * @Method("GET")
     */
    public function showAction(Grille $grille)
    {
        $deleteForm = $this->createDeleteForm($grille);

        return $this->render('grille/show.html.twig', array(
            'grille' => $grille,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Grille entity.
     *
     * @Route("/{id}/edit", name="grille_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Grille $grille)
    {
        $deleteForm = $this->createDeleteForm($grille);
        $editForm = $this->createForm('AppBundle\Form\GrilleType', $grille);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grille);
            $em->flush();

            return $this->redirectToRoute('grille_edit', array('id' => $grille->getId()));
        }

        return $this->render('grille/edit.html.twig', array(
            'grille' => $grille,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Grille entity.
     *
     * @Route("/{id}", name="grille_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Grille $grille)
    {
        $form = $this->createDeleteForm($grille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($grille);
            $em->flush();
        }

        return $this->redirectToRoute('index');
    }

    /**
     * Creates a form to delete a Grille entity.
     *
     * @param Grille $grille The Grille entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Grille $grille)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grille_delete', array('id' => $grille->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
