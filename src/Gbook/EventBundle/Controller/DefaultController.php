<?php

namespace Gbook\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Gbook\EventBundle\Entity\Event;
use Gbook\EventBundle\Form\EventType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $entity = new Event();
        $form   = $this->createForm(new EventType(), $entity);


        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventBundle:Event')->findAll();

        return $this->render('EventBundle:Event:index.html.twig', array(
                'entities' => $entities,
                'entity' => $entity,
                'form'   => $form->createView(),
            ));

    }
}







