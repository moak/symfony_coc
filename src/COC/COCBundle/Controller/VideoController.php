<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoController extends Controller
{
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id)

        );
        return $this->render('COCBundle:ImageBase:category.html.twig', array('images' => $list , 'hall_town' => $id ));
    }

    public function templateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findBy(
            array('hall_town' => $id)

        );
        return $this->render('COCBundle:ImageBase:template.html.twig', array('images' => $list , 'hall_town' => $id ));
    }


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Video')->findAll();

        foreach($list as $key => $value) {
            $list[$key]->setUrl($this->convertYoutube($list[$key]->getUrl()));
        }

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:Video:index.html.twig', array('videos' => $list));
    }

    public function editAction ($id, Request $request)
    {
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

    public function addAction (Request $request)
    {
        $video = new Video();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new VideoType(), $video);

        if ($form->handleRequest($request)->isValid())
        {
            $video->setUser($this->get('security.context')->getToken()->getUser());
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_videos'));
        }

        return $this->render('COCBundle:Video:add.html.twig', array(
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
