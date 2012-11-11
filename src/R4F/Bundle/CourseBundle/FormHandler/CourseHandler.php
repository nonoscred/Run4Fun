<?php
namespace R4F\SiteBundle\FormHandler;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use R4F\SiteBundle\Entity\Map;
use R4F\SiteBundle\Form\AddressType;
use R4F\SiteBundle\Entity\Course;


class CourseHandler 
{
    protected $form;
    protected $request;
    protected $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
    }

    public function process()
    {
        if( $this->request->getMethod() == 'POST' )
        {
            $this->form->bindRequest($this->request);

            if( $this->form->isValid() )
            {
                $this->onSuccess($this->form->getData());

                return true;
            }
        }

        return false;
    }

    public function onSuccess(Course $course)
    {
        $this->em->persist($course); 

        $subscription = new Subscription();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $subscription->setUser($user);
        $subscription->setCourse($course);
        $this->em->persist($subscription);   

        $this->em->flush();

        $this->get('session')->setFlash('notice', 'Your Course is created! & Subscription OK !');
    }
}
