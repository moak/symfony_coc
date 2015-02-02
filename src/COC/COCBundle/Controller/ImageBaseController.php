<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\ImageBase;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBaseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBaseController extends Controller
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
        $list = $em->getRepository('COCBundle:ImageBase')->findAll();

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:ImageBase:index.html.twig', array('images' => $list));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);

        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:ImageBase:show.html.twig', array('info' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $image = $em->getRepository('COCBundle:ImageBase')->find($id);

        $form = $this->get('form.factory')->create(new ImageType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images_base'));
        }

        return $this->render('COCBundle:ImageBase:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'image'  => $image
        ));
    }


    public function addAction (Request $request)
    {
        $image = new ImageBase();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBaseType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images_base'));
        }

        return $this->render('COCBundle:ImageBase:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
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
