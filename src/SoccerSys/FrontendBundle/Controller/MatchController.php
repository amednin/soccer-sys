<?php

namespace SoccerSys\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoccerSys\FrontendBundle\Entity\Match;
use SoccerSys\FrontendBundle\Form\MatchType;

/**
 * Match controller.
 *
 */
class MatchController extends Controller
{

    /**
     * Lists all Match entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SoccerSysFrontendBundle:Match')->findAll();

        return $this->render('SoccerSysFrontendBundle:Match:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Match entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Match();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fixture_show', array('id' => $entity->getId())));
        }

        return $this->render('SoccerSysFrontendBundle:Match:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Match entity.
    *
    * @param Match $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Match $entity)
    {
        $form = $this->createForm(new MatchType(), $entity, array(
            'action' => $this->generateUrl('fixture_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Match entity.
     *
     */
    public function newAction()
    {
        $entity = new Match();
        $form   = $this->createCreateForm($entity);

        return $this->render('SoccerSysFrontendBundle:Match:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Match entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Match')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Match entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysFrontendBundle:Match:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Match entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Match')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Match entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SoccerSysFrontendBundle:Match:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Match entity.
    *
    * @param Match $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Match $entity)
    {
        $form = $this->createForm(new MatchType(), $entity, array(
            'action' => $this->generateUrl('fixture_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Match entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SoccerSysFrontendBundle:Match')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Match entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fixture_edit', array('id' => $id)));
        }

        return $this->render('SoccerSysFrontendBundle:Match:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Match entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SoccerSysFrontendBundle:Match')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Match entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fixture'));
    }

    /**
     * Creates a form to delete a Match entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fixture_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
