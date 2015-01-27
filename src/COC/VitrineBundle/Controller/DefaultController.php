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
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add(
                'username',
                'text',
                array(
                    'attr' => array(
                        'placeholder' => 'Nom  compte',
                    ),
                    'label' => false,
                )
            )
            ->add(
                'password',
                'password',
                array(
                    'attr' => array(
                        'placeholder' => 'Mot de passe',
                    ),
                    'label' => false,
                )
            )

            ->add(
                'email',
                'text',
                array(
                    'attr' => array(
                        'placeholder' => 'Adresse email',
                    ),
                    'label' => false,
                )
            )

            ->add(
                'password2',
                'password',
                array(
                    'attr' => array(
                        'placeholder' => 'Répétez mot de passe',
                    ),
                    'label' => false,
                )
            )

            ->add(
                'name_clan',
                'text',
                array(
                    'attr' => array(
                        'placeholder' => 'Nom du clan',
                    ),
                    'label' => false,
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $data = $form->getData();
            $username   = $data['username'];
            $password   = $data['password'];
            $password2  = $data['password2'];
            $email      = $data['email'];
            $name_clan  = $data['name_clan'];

            $clan = new Clan();
            $clan->setName($name_clan);

            $em = $this->getDoctrine()->getManager();
            $em->persist($clan);
            $em->flush();
        }


        return $this->render('VitrineBundle:Default:index.html.twig', array(
            'form'      =>  $form->createView(),
        ));

    }
}
