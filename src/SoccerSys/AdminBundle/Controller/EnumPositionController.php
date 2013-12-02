<?php

namespace SoccerSys\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoccerSys\AdminBundle\Entity\EnumPosition;
use SoccerSys\AdminBundle\Form\EnumPositionType;

/**
 * EnumPosition controller.
 *
 */
class EnumPositionController extends Controller
{

    /**
     * Lists all EnumPosition entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SoccerSysAdminBundle:EnumPosition')->findAll();

        return $this->render('SoccerSysAdminBundle:EnumPosition:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EnumPosition entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EnumPosition();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('position_show', array('id' => $entity->getId())));
        }

        return $this->render('SoccerSysAdminBundle:EnumPosition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a EnumPosition entity.
    *
    * @param EnumPosition $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EnumPosition $entity)
    {
        $form = $this->createForm(new EnumPositionType(), $entity, array(
            'action' => $this->generateUrl('position_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EnumPosition entity.
     *
     */
    public function newAction()
    {
        $entity = new EnumPosition();
        $form   = $this->createCreateForm($entity);

        return $this->render('SoccerSysAdminBundle:EnumPosition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EnumPosition entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysAdminBundle:EnumPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumPosition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysAdminBundle:EnumPosition:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing EnumPosition entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysAdminBundle:EnumPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumPosition entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysAdminBundle:EnumPosition:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EnumPosition entity.
    *
    * @param EnumPosition $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EnumPosition $entity)
    {
        $form = $this->createForm(new EnumPositionType(), $entity, array(
            'action' => $this->generateUrl('position_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EnumPosition entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysAdminBundle:EnumPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumPosition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('position_edit', array('id' => $id)));
        }

        return $this->render('SoccerSysAdminBundle:EnumPosition:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EnumPosition entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SoccerSysAdminBundle:EnumPosition')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EnumPosition entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('position'));
    }

    /**
     * Creates a form to delete a EnumPosition entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('position_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
