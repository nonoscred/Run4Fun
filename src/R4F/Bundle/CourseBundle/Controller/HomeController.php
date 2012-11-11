<?php
namespace R4F\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $countUsers = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FRunnerBundle:User')
            ->countUsers()
        ;

        $countCourses = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->countCourses()
        ;

        $this->get('session')->setFlash('notice', sprintf(
            'Il y\'a actuellement <span class="badge badge-info">%d</span> runners inscrits, pour <span class="badge badge-info">%d</span> parcours !',
            $countUsers,
            $countCourses
        ));

        return array();
    }
}
