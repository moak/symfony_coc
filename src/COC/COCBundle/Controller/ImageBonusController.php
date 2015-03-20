<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\ImageBonus;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBonusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBonusController extends Controller
{
    public function indexAction($id_clan)
    {

        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBonus')->findBy( array('clan' => $id_clan));

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        return $this->render('COCBundle:ImageBonus:index.html.twig', array('clan' =>  $clan,'images' => $list));
    }

    public function showAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBonus')->findOneByUser($id);

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:ImageBonus:show.html.twig', array('clan' =>  $clan, 'info' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBonus')->findOneByUser($id);
        $image = $em->getRepository('COCBundle:ImageBonus')->find($id);

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        $form = $this->get('form.factory')->create(new ImageBonusType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $clan->setUpdated(new \Datetime());
            $em->persist($clan);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_imagesBonus'));
        }

        return $this->render('COCBundle:ImageBonus:edit.html.twig', array('clan' =>  $clan,
                'form'      =>  $form->createView(),
                'image'  => $image
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null || $this->getUser()->getClan() != $clan )
            throw $this->createNotFoundException('This page does not exist.');


        $image = new ImageBonus();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBonusType(), $image);


        if ($form->handleRequest($request)->isValid())
        {
            $clan->setUpdated(new \Datetime());
            $em->persist($clan);
            $em->flush();

            $image->setUser($this->getUser());
            $image->setClan($clan);
            $image->getImage()->setIdclan($clan->getId());


            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_imagesBonus', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:ImageBonus:add.html.twig', array('clan' =>  $clan,
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('COCBundle:ImageBonus')->find($id);


        if(!$image)
        {
            throw $this->createNotFoundException('No image found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_imagesBonus'));

    }
}
