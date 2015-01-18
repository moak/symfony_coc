<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\Player;
use Symfony\Component\HttpFoundation\Request;
use COC\AdminBundle\Form\Type\UserType;
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
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find($id);

        if(!$user)
        {
            throw $this->createNotFoundException('No user found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_users'));

    }


    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find($id);

        $form = $this->get('form.factory')->create(new UserType() );
        if ($form->handleRequest($request)->isValid())
        {
            $data = $request->request->all();

            $idPlayer = $data['player']['player'] ;
            $player = $em->getRepository('COCBundle:Player')->findOneById($idPlayer);

            $em = $this->getDoctrine()->getManager();
            $user->setPlayer($player);
            $player->setUser($user);
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_users'));
        }
        return $this->render('AdminBundle:UserAdmin:edit.html.twig', array(
            'form'      =>  $form->createView(),
            'user'  => $user
        ));
    }







}
