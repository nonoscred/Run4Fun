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


class CourseController extends Controller
{
    /**
     * @Route("/course/list")
     * @Template()
     */
    public function listAction()
    {
        $courses = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->CoursesAll()
        ;

        return array('courses' => $courses);
    }

    /**
     * @Route("/count/{_format}", Requirements={"_format" = "xml"})
     * @Template("R4FSiteBundle:Course:count.xml.twig")
     */  	
    public function countXmlAction()
    {
        $nbcourses = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->NbCourses()
        ;

        $nbusers = $this->getDoctrine()
              ->getEntityManager()
              ->getRepository('R4FRunnerBundle:User')
              ->NbUsers()
          ;
       
        return array(
            'nbcourses' => $nbcourses,
            'nbusers' => $nbusers,
        );
    }

    /**
     * @Template()
     */
    public function addressesStartAction($id)
    {
        $addresses_start = $this->getDoctrine()
          ->getEntityManager()
          ->getRepository('R4FSiteBundle:Map')
          ->AddressStart($id)
        ;

        return array('addresses_start' => $addresses_start);
    }

    /**
     * @Template()
     */    	
    public function addressesEndAction($id)
    {
        $addresses_end = $this->getDoctrine()
          ->getEntityManager()
          ->getRepository('R4FSiteBundle:Map')
          ->AddressEnd($id)
        ;

        return array('addresses_end' => $addresses_end);
    }

    /**
     * @Route("/course/{id}", requirements={"id" = "\d+"})
     * @Template()
     */
    public function selectAction($id)
    {
        $course = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->find($id)
        ;

        $address_start = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Map')
            ->AddressStart($id)
        ;

      $address_end = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Map')
            ->AddressEnd($id)
        ;

        return $this->render('R4FSiteBundle:Course:select.html.twig', array(
            'course' => $course,
            'address_start' => $address_start,
            'address_end' => $address_end,			
        ));
    }

    /**
     * @Route("/course/{id}/join", requirements={"id" = "\d+"})
     * @Template()
     */      
    public function joinAction($id)
    {
        $course = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->find($id)
        ;

        $user = $this->container->get('security.context')->getToken()->getUser();

        /* SERVICE */
        if($this->container->get('R4Fmanager')->isCourseSubscriber($user, $course)) {
            throw $this->createNotFoundException('You are already registred at this course !');
        }

        $subscription = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Subscription')
            ->subscribe($user, $course)
        ;

        /* EVENT DISPATCHER DESACTIVATE */
        $dispatcher = $this->container->get('event_dispatcher');
        $dispatcher->dispatch('SiteBundle.subscription_added', new SubscriptionEvent($subscription));

        $this->get('session')->setFlash('notice', 'Subscription OK !');

        return $this->render('R4FSiteBundle:Course:join.html.twig', array('course' => $course));
    }

    /**
     * @Route("/course/{id}/leave", requirements={"id" = "\d+"})
     * @Template()
     */
    public function leaveAction($id)
    {
        $course = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->find($id)
        ;

        $user = $this->container->get('security.context')->getToken()->getUser();

        $isUnsubscribed = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Subscription')
            ->unSubscribe($user, $course)
        ;

        if($isUnsubscribed) {
            $this->get('session')->setFlash('notice', 'Unsubscribe done');
        } else {
             $this->get('session')->setFlash('error', 'Error occur !');
        }

        return $this->render('R4FSiteBundle:Course:leave.html.twig', array('course' => $course));
    }

    /**
     * @Route("/course/new")
     * @Template()
     */
    public function newAction()
    {
        if( ! $this->get('security.context')->isGranted('ROLE_USER') )
        {
            //throw new AccessDeniedHttpException('Accès limité aux USERS!');
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $course = new Course();
        $form = $this->createForm(new CourseType(), $course);
        $validator = $this->get('validator');
        $liste_erreurs = $validator->validate($course);
        $request = $this->get('request');
        
        if( $request->getMethod() == 'POST' )
        {
            $form->bindRequest($request);
            if( $form->isValid() )
            { 
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($course);
                
                $address_start = $form->get('start_point')->get('address')->getData();
                $city_start = $form->get('start_point')->get('city')->getData();
                $zip_code_start = $form->get('start_point')->get('zip_code')->getData();
                $country_start = $form->get('start_point')->get('country')->getData();
                
                $address_end = $form->get('end_point')->get('address')->getData();
                $city_end = $form->get('end_point')->get('city')->getData();
                $zip_code_end = $form->get('end_point')->get('zip_code')->getData();
                $country_end = $form->get('end_point')->get('country')->getData();
                
                $start_address = new Address();
                $end_address = new Address();
                
                $start_address->setAddress($address_start);
                $end_address->setAddress($address_end);
                
                $start_address->setCity($city_start);
                $end_address->setCity($city_end);
               
                $start_address->setZipCode($zip_code_start);
                $end_address->setZipCode($zip_code_end);
                
                $start_address->setCountry($country_start);
                $end_address->setCountry($country_end);
                
                $em->persist($start_address);
                $em->persist($end_address);
                               
                $map_start = new Map();   
                $map_end = new Map();

                $map_start->setAddress($start_address);
                $map_start->setPriority(0);
                $map_start->setCourse($course);
                
                $map_end->setAddress($end_address);
                $map_end->setPriority(1);
                $map_end->setCourse($course);
                
                $em->persist($map_start);
                $em->persist($map_end);

                $subscription = new Subscription();

                $user = $this->container->get('security.context')->getToken()->getUser();
                
                $subscription->setUser($user);
                $subscription->setCourse($course);
                $em->persist($subscription);
                
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your Course is created! & Subscription OK !');

                return $this->redirect( $this->generateUrl('R4F_site_course_list') );
            }
            
            $this->get('session')->setFlash('error', 'Error');
        }
     
        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/course/{id}/users")
     * @Template()
     */
    public function listUsersAction($id)
    {
        $users = $this->getDoctrine()
            ->getRepository('R4FSiteBundle:Course')
            ->getUsers($id)
        ;

        return array('users' => $users);
    }

    /**
     * @Route("/course/{id}/action")
     */
    public function userSubscriptionAction($id)
    {
        $course = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Course')
            ->find($id)
        ;

        $user = $this->container->get('security.context')->getToken()->getUser();

        /* SERVICE 
        if($this->container->get('R4Fmanager')->isCourseSubscriber($user, $course)) {
            return $this->render(
                'R4FSiteBundle:Course:userCourseUnsubscribe.html.twig',
                array('course' => $course)
            );
        }*/
        
        return $this->render(
            'R4FSiteBundle:Course:userCourseSubscribe.html.twig',
            array('course' => $course)
        );
    }
}
