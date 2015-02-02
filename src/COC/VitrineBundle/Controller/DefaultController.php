<?php

namespace coc\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use COC\VitrineBundle\Form\Type\ClanType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Clan;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $clan = new Clan();
        $form = $this->get('form.factory')->create(new ClanType(), $clan);

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clan);
            $em->flush();
        }


        return $this->render('VitrineBundle:Default:index.html.twig', array(
            'form'      =>  $form->createView(),
        ));

    }
}
