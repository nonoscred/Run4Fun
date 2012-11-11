<?php

namespace R4F\Bundle\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\Bundle\SiteBundle\Entity\Partner;
use R4F\Bundle\SiteBundle\Form\PartnerType;

/**
 * Partner controller.
 *
 * @Route("/admin/partner")
 */
class PartnerController extends Controller
{
    /**
     * Lists all Partner entities.
     *
     * @Route("/", name="admin_partner")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('R4FSiteBundle:Partner')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Partner entity.
     *
     * @Route("/{id}/show", name="admin_partner_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FSiteBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Partner entity.
     *
     * @Route("/new", name="admin_partner_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Partner();
        $form   = $this->createForm(new PartnerType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Partner entity.
     *
     * @Route("/create", name="admin_partner_create")
     * @Method("POST")
     * @Template("R4FSiteBundle:Partner:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Partner();
        $form = $this->createForm(new PartnerType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been created', array(
                    '%entity%' => 'Partner',
                    '%id%'     => $entity->getId()
                ))
            );

            return $this->redirect($this->generateUrl('admin_partner_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Partner entity.
     *
     * @Route("/{id}/edit", name="admin_partner_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FSiteBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $editForm = $this->createForm(new PartnerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Partner entity.
     *
     * @Route("/{id}/update", name="admin_partner_update")
     * @Method("POST")
     * @Template("R4FSiteBundle:Partner:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FSiteBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PartnerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

        $this->get('session')->getFlashBag()->add(
            'info',
            $this->get('translator')->trans('%entity%[%id%] has been updated', array(
                '%entity%' => 'Partner',
                '%id%'     => $entity->getId()
            ))
        );

        return $this->redirect($this->generateUrl('admin_partner_edit', array('id' => $id)));
        
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Partner entity.
     *
     * @Route("/{id}/delete", name="admin_partner_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('R4FSiteBundle:Partner')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Partner entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been deleted', array(
                    '%entity%' => 'Partner',
                    '%id%'     => $id
                ))
            );
        }

        return $this->redirect($this->generateUrl('admin_partner'));
    }
    
    /**
     * Display Partner deleteForm.
     *
     * @Template()
     */
    public function deleteFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('R4FSiteBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
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
