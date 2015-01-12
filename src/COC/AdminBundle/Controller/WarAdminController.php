<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\War;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use COC\COCBundle\Form\Type\WarType;

class WarAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $wars = $em->getRepository('COCBundle:War')->findAll();

        return $this->render('AdminBundle:WarAdmin:index.html.twig', array('wars' => $wars));
    }

    public function addAction (Request $request)
    {
        $war = new War();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new WarType(), $war);

        if ($form->handleRequest($request)->isValid())
        {
            $start = clone $war->getStart();
            $war->setEnd($start->modify('+2 day'));
            $em->persist($war);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_wars'));
        }

        return $this->render('AdminBundle:WarAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);

        if(!$war)
        {
            throw $this->createNotFoundException('No war found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($war);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_wars'));

    }




}
