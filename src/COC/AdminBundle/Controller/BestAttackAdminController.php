<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\ImageBestAttack;
use COC\COCBundle\Form\Type\ImageBestAttackAdminType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBestAttackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BestAttackAdminController extends Controller
{
    public function templateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id)

        );
        return $this->render('AdminBundle:ImageBase:template.html.twig', array('images' => $list , 'hall_town' => $id ));
    }


    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBestAttack')->findAll();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        return $this->render('AdminBundle:BestAttackAdmin:index.html.twig', array('clan' => $clan,'images' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $bestAttack = $em->getRepository('COCBundle:ImageBestAttack')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $form = $this->get('form.factory')->create(new ImageBestAttackAdminType(), $bestAttack);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestAttack);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bestAttacks', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:BestAttackAdmin:edit.html.twig', array('clan' => $clan,
                'form'      =>  $form->createView(),'clan' => $clan,
                'bestAttack'  => $bestAttack
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $bestAttack = new ImageBestAttack();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBestAttackType(), $bestAttack);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($bestAttack);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bestAttacks', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:BestAttackAdmin:add.html.twig', array('clan' => $clan,
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $bestAttack = $em->getRepository('COCBundle:ImageBestAttack')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        if(!$bestAttack)
        {
            throw $this->createNotFoundException('No bestAttack found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($bestAttack);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_bestAttacks', array('id_clan' =>  $clan->getId())));

    }
}
