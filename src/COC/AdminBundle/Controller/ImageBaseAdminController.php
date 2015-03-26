<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\ImageBase;
use COC\COCBundle\Form\Type\ImageBaseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBaseAdminController extends Controller
{

    public function indexAction($id_clan)
    {
        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $list = $em->getRepository('COCBundle:ImageBase')->findByClan($clan,array('hall_town' => 'ASC') );


        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();

        return $this->render('AdminBundle:ImageBaseAdmin:index.html.twig', array('clan' => $clan,'images' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $imageBase = $em->getRepository('COCBundle:ImageBase')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new ImageBaseType(), $imageBase);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageBase);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBaseAdmin:edit.html.twig', array('clan' => $clan,
                'form'      =>  $form->createView(),
                'bestAttack'  => $imageBase
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $imageBase = new ImageBase();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBaseType(), $imageBase);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($imageBase);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBaseAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $imageBase = $em->getRepository('COCBundle:ImageBase')->find($id);

        if ( $imageBase  == null || $this->getUser()->getClan()->getId() != $imageBase->getUser()->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$imageBase || $this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        switch ($imageBase->getHallTown()) {
            case 5:
                $clan->setNumberBase5($clan->getNumberBase5() - 1);
                break;
            case 6:
                $clan->setNumberBase6($clan->getNumberBase6() - 1);
                break;
            case 7:
                $clan->setNumberBase7($clan->getNumberBase7() - 1);
                break;
            case 8:
                $clan->setNumberBase8($clan->getNumberBase8() - 1);
                break;
            case 9:
                $clan->setNumberBase9($clan->getNumberBase9() - 1);
                break;
            case 10:
                $clan->setNumberBase10($clan->getNumberBase10() - 1);
                break;
        }

        $clan->setUpdated(new \Datetime());
        $em->persist($clan);
        $em->flush();

        $em = $this->getDoctrine()->getManager();
        $em->remove($imageBase);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));

    }
}
