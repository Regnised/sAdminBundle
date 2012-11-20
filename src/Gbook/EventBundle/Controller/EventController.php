<?php
namespace Gbook\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Gbook\EventBundle\Entity\Event;
use Gbook\EventBundle\Form\EventType;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;

class EventController extends Controller
{
    public function indexAction(Request $request, $page)
    {
        $entity = new Event();
        $form = $this->createForm(new EventType(), $entity);

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('gbook_homepage'));
            }
        }

        $repository = $em->getRepository('EventBundle:Event');
        $entities = $repository->findAll();
        //from config file get variable
        $myVariable = $this->container->getParameter('myVariable');

        $adapter = new ArrayAdapter(array_reverse($entities));
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($myVariable);
        $pagerfanta->setCurrentPage($page);

        return $this->render('EventBundle:Event:index.html.twig', array(
                'form' => $form->createView(),
                'entities' => $pagerfanta,
            ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EventBundle:Event');

        $post = $repository->find($id);


        return $this->render('EventBundle:Event:show.html.twig', array(
                'entity' => $post,
            ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EventBundle:Event');

        $post = $repository->find($id);

        $em->remove($post);
        $em->flush();

        return $this->redirect($this->generateUrl('gbook_homepage'));
    }
}
