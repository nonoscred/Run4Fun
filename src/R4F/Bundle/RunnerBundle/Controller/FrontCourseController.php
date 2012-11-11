<?php

namespace R4F\Bundle\RunnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use R4F\Bundle\RunnerBundle\Entity\Courser;
use R4F\Bundle\RunnerBundle\Form\CourseType;

/**
 * User controller.
 *
 * @Route("/course")
 */
class FrontCourseController extends Controller
{
    /**
     * Lists all Course entities.
     *
     * @Route("/", name="r4f_course")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('R4FRunnerBundle:Course')->findAll();

        return array(
            'courses' => $courses,
        );
    }

    /**
     * Finds and displays a Course entity.
     *
     * @Route("/{id}/show", name="course_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $course = $em->getRepository('R4FRunnerBundle:Course')->find($id);

        if (!$course) {
            throw $this->createNotFoundException('Unable to find course entity.');
        }

        return array(
            'course'  => $course,
        );
    }
}
