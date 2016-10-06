<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;

/**
 * Admin controller.
 *
 * @Route("/superadmin")
 */
class AdminController extends Controller
{
    /**
     * Lists all Admin entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('AppBundle:Admin')->findAll();

        return $this->render('admin/index.html.twig', array(
            'admins' => $admins,
        ));
    }

    /**
     * Creates a new Admin entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $newAdmin = new Admin();
        $form = $this->createForm('AppBundle\Form\AdminType', $newAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($admin);
//            $em->flush();

            $req = $request->request->get('admin');
            //nouveau
            $tokenGenerator = $this->container->get('fos_user.util.token_generator');
            // générer une chaine de caractères
            $password = substr($tokenGenerator->generateToken(), 0 , 8); // character
            $userManager = $this->get('fos_user.user_manager');
           // $newAdmin = $userManager->createUser(); // permet de créeer un objet FOSuser
            $newAdmin->setUsername($req['email']); // username obligatoire
            $newAdmin->setPlainPassword($password); //passage du mode de passe en clair, puis cryptage dans la méthode
            $newAdmin->setEmail(trim($req['email'])); // email obligatoire
            $newAdmin->setRoles(array('ROLE_ADMIN')); // permet de définir le role par defaut
            $newAdmin->setEnabled(true); // rendre actif le compte, Par défaut inactif
            $userManager->updateUser($newAdmin); // mise a jour ou création dans la table

            $this->sendMailAdmin($password, $newAdmin);

            return $this->redirectToRoute('admin_show', array('id' => $newAdmin->getId()));
        }

        return $this->render('admin/new.html.twig', array(
            'admin' => $newAdmin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Admin entity.
     *
     * @Route("/{id}", name="admin_show")
     * @Method("GET")
     */
    public function showAction(Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);

        return $this->render('admin/show.html.twig', array(
            'admin' => $admin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Admin entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $editForm = $this->createForm('AppBundle\Form\AdminType', $admin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $admin->getId()));
        }

        return $this->render('admin/edit.html.twig', array(
            'admin' => $admin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Admin entity.
     *
     * @Route("/{id}", name="admin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Admin $admin)
    {
        $form = $this->createDeleteForm($admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a Admin entity.
     *
     * @param Admin $admin The Admin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Admin $admin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $admin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * string $pass
     * Admin $admin
     */
    private function sendMailAdmin($pass, Admin $admin){
        $destinataire = trim($admin->getEmail());
        $message = \Swift_Message::newInstance()
            ->setSubject('Première connexion à Streammi')
            ->setFrom('streammi.prisma@gmail.com')
            ->setTo(array($destinataire))
            ->setBody($this->render('admin/mailadmin.html.twig', array('pass' => $pass, 'admin'=> $admin))); // à revoir
            $this->get('mailer')->send($message);
    }
}
