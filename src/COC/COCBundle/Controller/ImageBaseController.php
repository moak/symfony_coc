<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\ImageBase;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBaseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBaseController extends Controller
{
    public function categoryAction($id, $id_clan)
    {

        $em = $this->getDoctrine()->getManager();

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id, 'clan' => $clan), array('type' => 'ASC')
        );

        return $this->render('COCBundle:ImageBase:category.html.twig', array('clan' =>  $clan,'images' => $list , 'hall_town' => $id ));
    }

    public function templateAction($id, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id, 'clan' => $clan)

        );
        return $this->render('COCBundle:ImageBase:template.html.twig', array('clan' =>  $clan,'images' => $list , 'hall_town' => $id ));
    }


    public function indexAction($id_clan)
    {

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');


        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy( array('clan' => $id_clan));

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:ImageBase:index.html.twig', array('clan' =>  $clan, 'images' => $list));
    }

    public function showAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;


        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:ImageBase:show.html.twig', array('clan' =>  $clan,'info' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $image = $em->getRepository('COCBundle:ImageBase')->find($id);

        $form = $this->get('form.factory')->create(new ImageType(), $image);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images_base', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:ImageBase:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'image'  => $image
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null || $this->getUser()->getClan() != $clan )
            throw $this->createNotFoundException('This page does not exist.');


        $image = new ImageBase();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBaseType(), $image);


        if ($form->handleRequest($request)->isValid())
        {
            $user = $this->get('security.context')->getToken()->getUser();
            $image->setUser($this->getUser());

            $image->setClan($clan);

            $image->getImage()->setClan($clan->getId());

            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images_base', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:ImageBase:add.html.twig', array('clan' =>  $clan,
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null || $this->getUser()->getClan() != $clan )
            throw $this->createNotFoundException('This page does not exist.');

        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('COCBundle:ImageBase')->find($id);

        if(!$image)
        {
            throw $this->createNotFoundException('No image found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_images_base'));

    }
}
