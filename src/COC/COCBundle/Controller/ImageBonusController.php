<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\ImageBonus;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBonusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBonusController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBonus')->findAll();

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:ImageBonus:index.html.twig', array('images' => $list));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBonus')->findOneByUser($id);

        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:ImageBonus:show.html.twig', array('info' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBonus')->findOneByUser($id);
        $image = $em->getRepository('COCBundle:ImageBonus')->find($id);

        $form = $this->get('form.factory')->create(new ImageBonusType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_imagesBonus'));
        }

        return $this->render('COCBundle:ImageBonus:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'image'  => $image
        ));
    }


    public function addAction (Request $request)
    {
        $image = new ImageBonus();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBonusType(), $image);

        if ($form->handleRequest($request)->isValid())
        {
            $image->setUser($this->get('security.context')->getToken()->getUser());
            $image->upload();
            $em->persist($image);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_imagesBonus'));
        }

        return $this->render('COCBundle:ImageBonus:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
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
