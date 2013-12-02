<?php

namespace SoccerSys\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoccerSys\FrontendBundle\Entity\Pimp;
use SoccerSys\FrontendBundle\Form\PimpType;

/**
 * Pimp controller.
 *
 */
class PimpController extends Controller
{

    /**
     * Lists all Pimp entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SoccerSysFrontendBundle:Pimp')->findAll();

        return $this->render('SoccerSysFrontendBundle:Pimp:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pimp entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pimp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pimp_show', array('id' => $entity->getId())));
        }

        return $this->render('SoccerSysFrontendBundle:Pimp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Pimp entity.
    *
    * @param Pimp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pimp $entity)
    {
        $form = $this->createForm(new PimpType(), $entity, array(
            'action' => $this->generateUrl('pimp_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pimp entity.
     *
     */
    public function newAction()
    {
        $entity = new Pimp();
        $form   = $this->createCreateForm($entity);

        return $this->render('SoccerSysFrontendBundle:Pimp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pimp entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Pimp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pimp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysFrontendBundle:Pimp:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Pimp entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Pimp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pimp entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysFrontendBundle:Pimp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pimp entity.
    *
    * @param Pimp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pimp $entity)
    {
        $form = $this->createForm(new PimpType(), $entity, array(
            'action' => $this->generateUrl('pimp_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pimp entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Pimp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pimp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pimp_edit', array('id' => $id)));
        }

        return $this->render('SoccerSysFrontendBundle:Pimp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pimp entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SoccerSysFrontendBundle:Pimp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pimp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pimp'));
    }

    /**
     * Creates a form to delete a Pimp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pimp_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
