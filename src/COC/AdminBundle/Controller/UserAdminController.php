<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UserAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('ApplicationSonataUserBundle:User')->findAll();

        return $this->render('AdminBundle:UserAdmin:index.html.twig', array('users' => $users));
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
