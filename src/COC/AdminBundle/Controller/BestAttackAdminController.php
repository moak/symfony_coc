<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\ImageBestAttack;
use COC\COCBundle\Form\Type\ImageBestAttackAdminType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ImageBestAttackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BestAttackAdminController extends Controller
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
        $list = $em->getRepository('COCBundle:ImageBestAttack')->findAll();

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('AdminBundle:BestAttackAdmin:index.html.twig', array('images' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $bestAttack = $em->getRepository('COCBundle:ImageBestAttack')->find($id);

        $form = $this->get('form.factory')->create(new ImageBestAttackAdminType(), $bestAttack);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestAttack);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bestAttacks'));
        }

        return $this->render('AdminBundle:BestAttackAdmin:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'bestAttack'  => $bestAttack
        ));
    }


    public function addAction (Request $request)
    {
        $bestAttack = new ImageBestAttack();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBestAttackType(), $bestAttack);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($bestAttack);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bestAttacks'));
        }

        return $this->render('AdminBundle:BestAttackAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $bestAttack = $em->getRepository('COCBundle:ImageBestAttack')->find($id);

        if(!$bestAttack)
        {
            throw $this->createNotFoundException('No bestAttack found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($bestAttack);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_bestAttacks'));

    }
}
