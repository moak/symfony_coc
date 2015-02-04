<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\VideoAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoAdminController extends Controller
{
    public function mainPageModuleAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $list = $em->getRepository('COCBundle:Video')->findBy(
            array('published' => '1')
        );
        foreach($list as $key => $value) {
            $list[$key]->setUrl($this->convertYoutube($list[$key]->getUrl()));
        }


        return $this->render('AdminBundle:VideoAdmin:mainPageModule.html.twig', array('clan' => $clan, 'videos' => $list));
    }


    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Video')->findAll();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        foreach($list as $key => $value) {
            $list[$key]->setUrl($this->convertYoutube($list[$key]->getUrl()));
        }

      //  $video->setUrl($this->convertYoutube($video->getUrl()));


        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('AdminBundle:VideoAdmin:index.html.twig', array('clan' => $clan, 'videos' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $video = $em->getRepository('COCBundle:Video')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new VideoAdminType(), $video);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_videos', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:VideoAdmin:edit.html.twig', array('clan' => $clan,
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
        $form = $this->get('form.factory')->create(new VideoAdminType(), $video);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $video->setUser($this->get('security.context')->getToken()->getUser());
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_videos', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:VideoAdmin:add.html.twig', array('clan' => $clan,
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('COCBundle:Video')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$video)
        {
            throw $this->createNotFoundException('No video found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_videos', array('id_clan' =>  $clan->getId())));

    }
}
