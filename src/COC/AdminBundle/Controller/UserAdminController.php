<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\Player;
use Symfony\Component\HttpFoundation\Request;
use COC\AdminBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UserAdminController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $users = $em->getRepository('ApplicationSonataUserBundle:User')->findBy( array('clan' =>$clan), array('player' => 'ASC'));
        return $this->render('AdminBundle:UserAdmin:index.html.twig', array('clan' => $clan,'users' => $users));
    }

    public function addAction (Request $request, $id_clan)
    {
        $war = new War();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new WarType(), $war);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $start = clone $war->getStart();
            $war->setEnd($start->modify('+2 day'));
            $em->persist($war);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_wars', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:WarAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }


    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find(array('id' => $id, 'clan' => $id_clan));

        if ( $user == null || $this->getUser()->getClan()->getId() != $user->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if($user != null && $this->getUser()->getClan()->getId() == $id_clan)
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();


            return $this->redirect($this->generateUrl('admin_users', array('id_clan' =>  $clan->getId())));

        }
        else{
            throw $this->createNotFoundException('No user found');
        }


    }


    public function dissociateAction($id, $id_clan)
    {

        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->findOneByPlayer($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$user)
        {
            throw $this->createNotFoundException('No user found');
        }
        $user->setPlayer(null);
        $user->setPlayer(null);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_users', array('id_clan' =>  $clan->getId())));
    }

    public function setAccessAction($id, $id_clan, $access)
    {
        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$user)
        {
            throw $this->createNotFoundException('No user found');
        }
        if( $access == "ROLE_USER")
        {
            $user->addRole($access);
            $user->removeRole("ROLE_ADMIN");
        }
        else
        {
            $user->addRole($access);
        }

        $em->flush();

        $token = $this->get( 'security.context' )->getToken();

        // flush document manager or sth like that
        $token->setAuthenticated( false );

        return $this->redirect($this->generateUrl('admin_users',  array('id_clan' =>  $clan->getId())));
    }


    public function editAction ($id, Request $request, $id_clan)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find(array('id' => $id, 'clan' => $id_clan));

        if ( $user == null || $this->getUser()->getClan()->getId() != $user->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new UserType($clan) );


        if ($form->handleRequest($request)->isValid())
        {
            $data = $request->request->all();

            $idPlayer = $data['player']['player'] ;
            $player = $em->getRepository('COCBundle:Player')->findOneById($idPlayer);

            $user->setPlayer($player);
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:UserAdmin:edit.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
            'user'  => $user
        ));
    }







}
