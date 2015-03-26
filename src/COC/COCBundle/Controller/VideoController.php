<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Video')->findBy( array('clan' => $id_clan));

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        foreach($list as $key => $value) {
            $list[$key]->setUrl($this->convertYoutube($list[$key]->getUrl()));
        }

        return $this->render('COCBundle:Video:index.html.twig', array('clan' => $clan,'videos' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $video = $em->getRepository('COCBundle:Video')->find($id);

        $form = $this->get('form.factory')->create(new ImageType(), $video);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_videos'));
        }

        return $this->render('COCBundle:Video:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'video'  => $video
        ));
    }


    public function convertYoutube($string) {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='100%' height='200' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $string
        );
    }

    public function addAction (Request $request, $id_clan)
    {
        $video = new Video();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new VideoType(), $video);

        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        if ($form->handleRequest($request)->isValid())
        {
            $video->setClan($clan);

            $clan->setUpdated(new \Datetime());
            $clan->setNumberVideo($clan->getNumberVideo() + 1);
            $em->persist($clan);
            $em->flush();

            $video->setUser($this->get('security.context')->getToken()->getUser());
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_videos', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:Video:add.html.twig', array('clan' => $clan,
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('COCBundle:Video')->find($id);


        if(!$video)
        {
            throw $this->createNotFoundException('No image found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_videos'));

    }
}
