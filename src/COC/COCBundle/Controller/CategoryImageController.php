<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\Image;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryImageController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('COCBundle:CategoryImage')->findAll();

        return $this->render('COCBundle:CategoryImage:menu.html.twig', array('categories' => $categories ));
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Image')->findAll();

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:Image:index.html.twig', array('images' => $list));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:Image')->findOneByUser($id);

        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:Image:show.html.twig', array('info' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:Image')->findOneByUser($id);
        $image = $em->getRepository('COCBundle:Image')->find($id);

        $form = $this->get('form.factory')->create(new ImageType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images'));
        }

        return $this->render('COCBundle:Image:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'image'  => $image
        ));
    }


    public function addAction (Request $request)
    {
        $image = new Image();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $image->upload();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_images'));
        }

        return $this->render('COCBundle:Image:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('COCBundle:Image')->find($id);

        if(!$image)
        {
            throw $this->createNotFoundException('No image found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_images'));

    }
}
