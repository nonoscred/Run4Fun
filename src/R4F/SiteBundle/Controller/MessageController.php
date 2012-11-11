<?php
namespace R4F\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use R4F\SiteBundle\Entity\Message;
use R4F\SiteBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MessageController extends Controller
{      
    /**
     * @Template()
     */
    public function listMessagesAction($id)
    {
        $messages = $this->getDoctrine()
            ->getRepository('R4FSiteBundle:Message')
            ->getMessages($id)
        ;
        
        return array('messages' => $messages);
    }
    
    /**
     * @Template()
     */    
    public function indexAction($id)
    {
        $message = new Message;
        $form = $this->createForm(new MessageType, $message);
        $validator = $this->get('validator');
        $liste_erreurs = $validator->validate($message);
        $request = $this->get('request');
        $course = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('R4FSiteBundle:Course')
                    ->find($id)
        ;
        
        if( $request->getMethod() == 'POST' )
        {
            $form->bindRequest($request);
            if( $form->isValid() )
            {                
                $em = $this->getDoctrine()->getEntityManager();
                                
                $user = $this->container->get('security.context')->getToken()->getUser();
                $message->setUser($user);
                $message->setCourse($course);
               
                $em->persist($message);
                $em->flush();
                
                $this->get('session')->setFlash('notice', 'Your message is sended');

            }
        }
        
        return $this->render('R4FSiteBundle:Message:index.html.twig', array(
            'form' => $form->createView(),
            'course' => $course,
        ));   
    
    }
}
