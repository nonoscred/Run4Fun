<?php

namespace R4F\Bundle\RunnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\Bundle\RunnerBundle\Entity\Aim;
use R4F\Bundle\RunnerBundle\Form\AimType;

/**
 * Aim controller.
 *
 * @Route("/admin/aim")
 */
class AimController extends Controller
{
    /**
     * Lists all Aim entities.
     *
     * @Route("/", name="admin_aim")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('R4FRunnerBundle:Aim')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Aim entity.
     *
     * @Route("/{id}/show", name="admin_aim_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FRunnerBundle:Aim')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aim entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Aim entity.
     *
     * @Route("/new", name="admin_aim_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Aim();
        $form   = $this->createForm(new AimType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Aim entity.
     *
     * @Route("/create", name="admin_aim_create")
     * @Method("POST")
     * @Template("R4FRunnerBundle:Aim:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Aim();
        $form = $this->createForm(new AimType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been created', array(
                    '%entity%' => 'Aim',
                    '%id%'     => $entity->getId()
                ))
            );

            return $this->redirect($this->generateUrl('admin_aim_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Aim entity.
     *
     * @Route("/{id}/edit", name="admin_aim_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FRunnerBundle:Aim')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aim entity.');
        }

        $editForm = $this->createForm(new AimType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Aim entity.
     *
     * @Route("/{id}/update", name="admin_aim_update")
     * @Method("POST")
     * @Template("R4FRunnerBundle:Aim:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FRunnerBundle:Aim')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aim entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AimType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

        $this->get('session')->getFlashBag()->add(
            'info',
            $this->get('translator')->trans('%entity%[%id%] has been updated', array(
                '%entity%' => 'Aim',
                '%id%'     => $entity->getId()
            ))
        );

        return $this->redirect($this->generateUrl('admin_aim_edit', array('id' => $id)));
        
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Aim entity.
     *
     * @Route("/{id}/delete", name="admin_aim_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('R4FRunnerBundle:Aim')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Aim entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been deleted', array(
                    '%entity%' => 'Aim',
                    '%id%'     => $id
                ))
            );
        }

        return $this->redirect($this->generateUrl('admin_aim'));
    }
    
    /**
     * Display Aim deleteForm.
     *
     * @Template()
     */
    public function deleteFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FRunnerBundle:Aim')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aim entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
