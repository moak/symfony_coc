<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoAdminController extends Controller
{
    public function templateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id)

        );
        return $this->render('AdminBundle:ImageBase:template.html.twig', array('images' => $list , 'hall_town' => $id ));
    }


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Video')->findAll();

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('AdminBundle:VideoAdmin:index.html.twig', array('videos' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $video = $em->getRepository('COCBundle:Video')->find($id);

        $form = $this->get('form.factory')->create(new VideoType(), $video);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_videos'));
        }

        return $this->render('AdminBundle:VideoAdmin:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'video'  => $video
        ));
    }


    public function convertYoutube($string) {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='100%' height='200' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $string
        );
    }

    public function addAction (Request $request)
    {
        $video = new Video();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new VideoType(), $video);

        if ($form->handleRequest($request)->isValid())
        {
            $video->setUrl($this->convertYoutube($video->getUrl()));
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_videos'));
        }

        return $this->render('AdminBundle:VideoAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('COCBundle:Video')->find($id);

        if(!$video)
        {
            throw $this->createNotFoundException('No video found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_videos'));

    }
}
