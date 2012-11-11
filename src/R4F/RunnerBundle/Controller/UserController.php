<?php
namespace R4F\RunnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\RunnerBundle\Entity\User;
use R4F\RunnerBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("/user/list")
     * @Template()
     */
    public function listAction()
    {
        die('test');
        $users  = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FRunnerBundle:User')
            ->findAll()
        ;

        return array('users' => $users);
    }

    /**
     * @Route("/user/{id}")
     * @Template()
     */
    public function selectAction($id)
    {
        if( ! $this->get('security.context')->isGranted('ROLE_USER') )
        {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $user = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FRunnerBundle:User')
            ->find($id)
        ;

        $me = $this->container->get('security.context')->getToken()->getUser();
        $me->getId();

        if($me == $user)
        {
           $myspace = 1;
        }
        else{
          $myspace = 0;
        }

        $mycourses = $this->getDoctrine()
            ->getRepository('R4FSiteBundle:Course')
            ->MyCourses($id)
        ;

        return $this->render('R4FRunnerBundle:User:select.html.twig', array(
            'id' => $id,
            'user' => $user,
            'myspace' => $myspace,
            'me' => $me,
            'mycourses' => $mycourses
        ));
    }
}
