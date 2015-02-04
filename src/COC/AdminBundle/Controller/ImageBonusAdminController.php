<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\ImageBonus;
use COC\COCBundle\Form\Type\ImageBestAttackAdminType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBonusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBonusAdminController extends Controller
{

    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBonus')->findAll();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);
        return $this->render('AdminBundle:ImageBonusAdmin:index.html.twig', array('clan' => $clan,'images' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBonus')->findOneByUser($id);
        $imageBonus = $em->getRepository('COCBundle:ImageBonus')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new ImageBonusType(), $imageBonus);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageBonus);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_imagesBonus', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBonusAdmin:edit.html.twig', array('clan' => $clan,
                'form'      =>  $form->createView(),
                'bestAttack'  => $imageBonus
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $imageBonus = new ImageBonus();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBonusType(), $imageBonus);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($imageBonus);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_imagesBonus', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBonusAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $imageBonus = $em->getRepository('COCBundle:ImageBonus')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$imageBonus)
        {
            throw $this->createNotFoundException('No bestAttack found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($imageBonus);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_imagesBonus', array('id_clan' =>  $clan->getId())));

    }
}
