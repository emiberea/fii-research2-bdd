<?php

namespace EB\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EB\AppBundle\Entity\Admission;
use EB\AppBundle\Form\AdmissionEditType;
use EB\AppBundle\Form\AdmissionType;

/**
 * Admission controller.
 *
 * @Route("/admission")
 */
class AdmissionController extends Controller
{

    /**
     * Lists all Admission entities.
     *
     * @Route("/", name="admission")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EBAppBundle:Admission')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Admission entity.
     *
     * @Route("/", name="admission_create")
     * @Method("POST")
     * @Template("EBAppBundle:Admission:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Admission();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admission_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Admission entity.
     *
     * @param Admission $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Admission $entity)
    {
        $form = $this->createForm(new AdmissionType(), $entity, array(
            'action' => $this->generateUrl('admission_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Admission entity.
     *
     * @Route("/new", name="admission_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Admission();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Admission entity.
     *
     * @Route("/{id}", name="admission_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EBAppBundle:Admission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Admission entity.
     *
     * @Route("/{id}/edit", name="admission_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EBAppBundle:Admission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admission entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Admission entity.
    *
    * @param Admission $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Admission $entity)
    {
        $form = $this->createForm(new AdmissionEditType(), $entity, array(
            'action' => $this->generateUrl('admission_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Admission entity.
     *
     * @Route("/{id}", name="admission_update")
     * @Method("PUT")
     * @Template("EBAppBundle:Admission:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EBAppBundle:Admission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admission_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Admission entity.
     *
     * @Route("/{id}", name="admission_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EBAppBundle:Admission')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Admission entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admission'));
    }

    /**
     * Creates a form to delete a Admission entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admission_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
