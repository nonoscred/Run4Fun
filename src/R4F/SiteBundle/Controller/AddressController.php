<?php
namespace R4F\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\SiteBundle\Form\CourseType;
use R4F\SiteBundle\Form\CourseHandler;
use R4F\SiteBundle\Entity\Course;
use R4F\SiteBundle\Entity\Address;
use R4F\SiteBundle\Entity\Map;
use R4F\SiteBundle\Entity\Subscription;
use R4F\SiteBundle\Event\SubscriptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AddressController extends Controller
{
    public function getStartPoint($course_id)
    {
        $address_start = $this->getDoctrine()
            ->getRepository('R4FSiteBundle:Address')
            ->getStartPoint($course_id)
        ;

        return $this->render('R4FSiteBundle:Course:list.html.twig', array(
            'address_start' => $address_start,
        ));
    }
}
