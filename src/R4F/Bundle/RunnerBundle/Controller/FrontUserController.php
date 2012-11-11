<?php

namespace R4F\Bundle\RunnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\Bundle\RunnerBundle\Entity\User;
use R4F\Bundle\RunnerBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/user")
 */
class FrontUserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/", name="r4f_user")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('R4FRunnerBundle:User')->findAll();

        return array(
            'users' => $users,
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}/show", name="user_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('R4FRunnerBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return array(
            'user'      => $user,
        );
    }
}
