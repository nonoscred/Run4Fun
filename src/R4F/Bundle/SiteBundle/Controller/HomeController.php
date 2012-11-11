<?php
namespace R4F\Bundle\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="r4f_site_home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/partners.{_format}", requirements={"_format" = "xml|json"}, name="r4f_partners")
     * @Template()
     */
    public function listPartnerAction(Request $request)
    {
        $format = $request->getRequestFormat();
        $contentTypes = array(
            'json'  => 'application/json; charset=UTF-8',
            'xml'   => 'text/xml; charset=UTF-8'
        );

        $partners = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('R4FSiteBundle:Partner')
            ->findAll()
        ;

        if(!$partners)
            $this->createNotFoundException("No results found");

        if($format == 'html') {
            return $this->render('R4FSiteBundle:Partner:list.html.twig', array(
                'partners' => $partners
            ));
        }

        $response = $this->render(
            sprintf('R4FSiteBundle:Partner:list.%s.twig', $format),
            array('partners' => $partners)
        );

        $response->headers->set('Content-Type', $contentTypes[$format]);

        return $response;
    }
}
