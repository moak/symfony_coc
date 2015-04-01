<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use COC\COCBundle\Form\Type\PhoneType;




class UserController extends Controller
{

    public function editPhoneAction(Request $request, $id_clan)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $player = $em->getRepository('COCBundle:Player')->find($user->getPlayer()->getId());
        $formPhone = $this->get('form.factory')->create(new PhoneType(), $user);

        if ($formPhone->handleRequest($request)->isValid())
        {

            $user->setPhone($formPhone->get('country')->getData());
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('coc_player', array(
                'id_clan'                  => $clan->getId(),
                'id_player'                => $player->getId(),
            )));
        }
        return $this->render('COCBundle:User:editPhone.html.twig', array( 'clan' => $clan,  'form'  => $formPhone->createView(),));
    }
}
