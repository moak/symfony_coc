<?php

namespace Application\Sonata\UserBundle\Controller;


use COC\COCBundle\Entity\Clan;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\Video;
use COC\COCBundle\Entity\Image;
use COC\COCBundle\Entity\ImageBonus;
use COC\COCBundle\Entity\ImageBase;
use COC\COCBundle\Entity\ImageBestAttack;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;



class RegistrationController extends BaseController
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

    public function registerAction()
    {
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            $url = $this->container->get('router')->generate('vitrine_homepage');
            $response = new RedirectResponse($url);
            return $response;
        }
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process)
        {
            $user = $form->getData();
            $clanName = $user->getClanName();

            $authUser = false;
            if ($confirmationEnabled)
            {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'coc';
            }

            $em = $this->container->get('doctrine')->getManager();

            if ( $clanName != null)
            {
                $clan = new Clan();
                $clan->setName($user->getClanName());
                $clan->setMessage('Bienvenue sur le site du clan');
                $clan->setCapacity(10);
                $clan->setStatus(0);
                $clan->setPrivacy(0);
                $em->persist($clan);
                $em->flush();

                $idClan = $clan->getId();
                $clan = $em->getRepository('COCBundle:Clan')->find($idClan);

                $user->setClan($clan);
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setVisited(0);
                $user->setLearned(0);
                $user->setPrivacy(0);
                $em->persist($user);
                $em->flush($user);

                $imageBestAttack = $em->getRepository('COCBundle:Image')->findOneByPath("bestattaque.png");
                $bestAttack = new ImageBestAttack();
                $bestAttack->setClan($clan);
                $bestAttack->setElixir(373293);
                $bestAttack->setGold(346732);
                $bestAttack->setImage($imageBestAttack);
                $bestAttack->setUser($user);

                $imageBonus1 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus1.png");
                $bonus1 = new ImageBonus();
                $bonus1->setClan($clan);
                $bonus1->setImage($imageBonus1);
                $bonus1->setUser($user);

                $imageBonus2 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus2.png");
                $bonus2 = new ImageBonus();
                $bonus2->setClan($clan);
                $bonus2->setImage($imageBonus2);
                $bonus2->setUser($user);

                $imageBonus3 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus3.png");
                $bonus3 = new ImageBonus();
                $bonus3->setClan($clan);
                $bonus3->setImage($imageBonus3);
                $bonus3->setUser($user);

                $em->persist($bonus1);
                $em->persist($bonus2);
                $em->persist($bonus3);

                $video1 = new Video();
                $video1->setUrl("https://www.youtube.com/watch?v=FhHeH6MMjTM");
                $video1->setUser($user);
                $video1->setTitle("Example video");
                $video1->setClan($clan);

                $video2 = new Video();
                $video2->setUrl("https://www.youtube.com/watch?v=GC2qk2X3fKA");
                $video2->setUser($user);
                $video2->setTitle("Taken haha");
                $video2->setClan($clan);

                $em->persist($video1);
                $em->persist($video2);

                $em->persist($bestAttack);
                $em->flush();

                $player1 = new Player();
                $player1->setClan($clan);
                $player1->setName($user->getUsername());
                $player1->setHallTown(5);
                $player1->setLevel(40);
                $player1->setTroopReceived(245);
                $player1->setTroopSent(413);
                $player1->setAttackWon(47);
                $player1->setTrophy(1124);

                $player1->setCanon1(2);
                $player1->setCanon2(3);
                $player1->setCanon3(0);
                $player1->setCanon4(0);
                $player1->setCanon5(0);
                $player1->setCanon6(0);

                $player1->setTowerArcher1(3);
                $player1->setTowerArcher2(2);
                $player1->setTowerArcher3(0);
                $player1->setTowerArcher4(0);
                $player1->setTowerArcher5(0);
                $player1->setTowerArcher6(0);
                $player1->setTowerArcher7(0);

                $player1->setTowerMagic1(0);
                $player1->setTowerMagic2(0);
                $player1->setTowerMagic3(0);
                $player1->setTowerMagic4(0);

                $player1->setAirDefence1(1);
                $player1->setAirDefence2(0);
                $player1->setAirDefence3(0);
                $player1->setAirDefence4(0);

                $player1->setMortar1(0);
                $player1->setMortar2(0);
                $player1->setMortar3(0);
                $player1->setMortar4(0);

                $player1->setTesla1(0);
                $player1->setTesla2(0);
                $player1->setTesla3(0);
                $player1->setTesla4(0);

                $player1->setInferno1(0);
                $player1->setInferno2(0);

                $player1->setArcx1(0);
                $player1->setArcx2(0);
                $player1->setArcx3(0);


                $player1->setBarbar(2);
                $player1->setArcher(2);
                $player1->setGobelin(3);
                $player1->setGeant(2);
                $player1->setWallBreaker(2);
                $player1->setBallon(0);
                $player1->setHealer(1);
                $player1->setWizard(0);
                $player1->setDragon(0);
                $player1->setPekka(0);

                $player1->setKing(0);
                $player1->setQueen(0);

                $player1->setMinion(0);
                $player1->setRider(0);
                $player1->setValkyrie(0);
                $player1->setGolem(0);
                $player1->setWitch(0);
                $player1->setLava(0);

                $player1->setGold1(0);
                $player1->setGold2(0);
                $player1->setGold3(0);
                $player1->setGold4(0);
                $player1->setGold5(0);
                $player1->setGold6(0);
                $player1->setGold7(0);

                $player1->setElixir1(0);
                $player1->setElixir2(0);
                $player1->setElixir3(0);
                $player1->setElixir4(0);
                $player1->setElixir5(0);
                $player1->setElixir6(0);
                $player1->setElixir7(0);


                $player1->setPotionDamage(1);
                $player1->setPotionHeal(0);
                $player1->setPotionBoost(0);
                $player1->setPotionGreen(0);
                $player1->setPotionFreeze(0);

                $player1->setUser($user);

               /* $player2 = new Player();
                $player2->setClan($clan);
                $player2->setName('Smith');
                $player2->setHallTown(5);
                $player2->setLevel(50);
                $player2->setTroopReceived(874);
                $player2->setTroopSent(1241);
                $player2->setAttackWon(98);
                $player2->setTrophy(1235);

                $player2->setCanon1(3);
                $player2->setCanon2(2);
                $player2->setCanon3(3);
                $player2->setCanon4(0);
                $player2->setCanon5(0);
                $player2->setCanon6(0);

                $player2->setTowerArcher1(3);
                $player2->setTowerArcher2(3);
                $player2->setTowerArcher3(3);
                $player2->setTowerArcher4(0);
                $player2->setTowerArcher5(0);
                $player2->setTowerArcher6(0);
                $player2->setTowerArcher7(0);

                $player2->setTowerMagic1(2);
                $player2->setTowerMagic2(0);
                $player2->setTowerMagic3(0);
                $player2->setTowerMagic4(0);

                $player2->setAirDefence1(2);
                $player2->setAirDefence2(0);
                $player2->setAirDefence3(0);
                $player2->setAirDefence4(0);

                $player2->setMortar1(2);
                $player2->setMortar2(0);
                $player2->setMortar3(0);
                $player2->setMortar4(0);

                $player2->setTesla1(0);
                $player2->setTesla2(0);
                $player2->setTesla3(0);
                $player2->setTesla4(0);

                $player2->setInferno1(0);
                $player2->setInferno2(0);

                $player2->setArcx1(0);
                $player2->setArcx2(0);
                $player2->setArcx3(0);


                $player2->setBarbar(3);
                $player2->setArcher(3);
                $player2->setGobelin(3);
                $player2->setGeant(3);
                $player2->setWallBreaker(2);
                $player2->setBallon(2);
                $player2->setHealer(1);
                $player2->setWizard(0);
                $player2->setDragon(0);
                $player2->setPekka(0);

                $player2->setKing(0);
                $player2->setQueen(0);

                $player2->setMinion(0);
                $player2->setRider(0);
                $player2->setValkyrie(0);
                $player2->setGolem(0);
                $player2->setWitch(0);
                $player2->setLava(0);

                $player2->setGold1(0);
                $player2->setGold2(0);
                $player2->setGold3(0);
                $player2->setGold4(0);
                $player2->setGold5(0);
                $player2->setGold6(0);
                $player2->setGold7(0);

                $player2->setElixir1(0);
                $player2->setElixir2(0);
                $player2->setElixir3(0);
                $player2->setElixir4(0);
                $player2->setElixir5(0);
                $player2->setElixir6(0);
                $player2->setElixir7(0);


                $player2->setPotionDamage(1);
                $player2->setPotionHeal(0);
                $player2->setPotionBoost(0);
                $player2->setPotionGreen(0);
                $player2->setPotionFreeze(0);


                $player3 = new Player();
                $player3->setClan($clan);
                $player3->setName('Franck');
                $player3->setHallTown(7);
                $player3->setLevel(67);
                $player3->setTroopReceived(337);
                $player3->setTroopSent(11);
                $player3->setAttackWon(6);
                $player3->setTrophy(1235);

                $player3->setCanon1(2);
                $player3->setCanon2(1);
                $player3->setCanon3(2);
                $player3->setCanon4(2);
                $player3->setCanon5(1);
                $player3->setCanon6(0);

                $player3->setTowerArcher1(1);
                $player3->setTowerArcher2(1);
                $player3->setTowerArcher3(1);
                $player3->setTowerArcher4(2);
                $player3->setTowerArcher5(0);
                $player3->setTowerArcher6(0);
                $player3->setTowerArcher7(0);

                $player3->setTowerMagic1(2);
                $player3->setTowerMagic2(1);
                $player3->setTowerMagic3(0);
                $player3->setTowerMagic4(0);

                $player3->setAirDefence1(2);
                $player3->setAirDefence2(1);
                $player3->setAirDefence3(0);
                $player3->setAirDefence4(0);

                $player3->setMortar1(2);
                $player3->setMortar2(1);
                $player3->setMortar3(0);
                $player3->setMortar4(0);

                $player3->setTesla1(1);
                $player3->setTesla2(0);
                $player3->setTesla3(0);
                $player3->setTesla4(0);

                $player3->setInferno1(0);
                $player3->setInferno2(0);

                $player3->setArcx1(0);
                $player3->setArcx2(0);
                $player3->setArcx3(0);


                $player3->setBarbar(2);
                $player3->setArcher(2);
                $player3->setGobelin(1);
                $player3->setGeant(1);
                $player3->setWallBreaker(0);
                $player3->setBallon(0);
                $player3->setHealer(1);
                $player3->setWizard(0);
                $player3->setDragon(1);
                $player3->setPekka(0);

                $player3->setKing(0);
                $player3->setQueen(0);

                $player3->setMinion(0);
                $player3->setRider(0);
                $player3->setValkyrie(0);
                $player3->setGolem(0);
                $player3->setWitch(0);
                $player3->setLava(0);

                $player3->setGold1(0);
                $player3->setGold2(0);
                $player3->setGold3(0);
                $player3->setGold4(0);
                $player3->setGold5(0);
                $player3->setGold6(0);
                $player3->setGold7(0);

                $player3->setElixir1(0);
                $player3->setElixir2(0);
                $player3->setElixir3(0);
                $player3->setElixir4(0);
                $player3->setElixir5(0);
                $player3->setElixir6(0);
                $player3->setElixir7(0);

                $player3->setPotionDamage(0);
                $player3->setPotionHeal(0);
                $player3->setPotionBoost(1);
                $player3->setPotionGreen(0);
                $player3->setPotionFreeze(0);

                $player4 = new Player();
                $player4->setClan($clan);
                $player4->setName('Hercule');
                $player4->setHallTown(6);
                $player4->setLevel(44);
                $player4->setTroopReceived(196);
                $player4->setTroopSent(871);
                $player4->setAttackWon(46);
                $player4->setTrophy(1195);

                $player4->setCanon1(3);
                $player4->setCanon2(3);
                $player4->setCanon3(3);
                $player4->setCanon4(0);
                $player4->setCanon5(0);
                $player4->setCanon6(0);

                $player4->setTowerArcher1(3);
                $player4->setTowerArcher2(4);
                $player4->setTowerArcher3(4);
                $player4->setTowerArcher4(4);
                $player4->setTowerArcher5(0);
                $player4->setTowerArcher6(0);
                $player4->setTowerArcher7(0);

                $player4->setTowerMagic1(3);
                $player4->setTowerMagic2(3);
                $player4->setTowerMagic3(0);
                $player4->setTowerMagic4(0);

                $player4->setAirDefence1(4);
                $player4->setAirDefence2(0);
                $player4->setAirDefence3(0);
                $player4->setAirDefence4(0);

                $player4->setMortar1(4);
                $player4->setMortar2(4);
                $player4->setMortar3(0);
                $player4->setMortar4(0);

                $player4->setTesla1(0);
                $player4->setTesla2(0);
                $player4->setTesla3(0);
                $player4->setTesla4(0);

                $player4->setInferno1(0);
                $player4->setInferno2(0);

                $player4->setArcx1(0);
                $player4->setArcx2(0);
                $player4->setArcx3(0);


                $player4->setBarbar(4);
                $player4->setArcher(4);
                $player4->setGobelin(4);
                $player4->setGeant(4);
                $player4->setWallBreaker(4);
                $player4->setBallon(2);
                $player4->setHealer(1);
                $player4->setWizard(0);
                $player4->setDragon(0);
                $player4->setPekka(0);

                $player4->setKing(0);
                $player4->setQueen(0);

                $player4->setMinion(0);
                $player4->setRider(0);
                $player4->setValkyrie(0);
                $player4->setGolem(0);
                $player4->setWitch(0);
                $player4->setLava(0);

                $player4->setGold1(0);
                $player4->setGold2(0);
                $player4->setGold3(0);
                $player4->setGold4(0);
                $player4->setGold5(0);
                $player4->setGold6(0);
                $player4->setGold7(0);

                $player4->setElixir1(0);
                $player4->setElixir2(0);
                $player4->setElixir3(0);
                $player4->setElixir4(0);
                $player4->setElixir5(0);
                $player4->setElixir6(0);
                $player4->setElixir7(0);


                $player4->setPotionDamage(2);
                $player4->setPotionHeal(2);
                $player4->setPotionBoost(0);
                $player4->setPotionGreen(0);
                $player4->setPotionFreeze(0);

*/
                $em->persist($player1);
                $em->flush($player1);
               /* $em->persist($player2);
                $em->flush($player2);
                $em->persist($player3);
                $em->flush($player3);
                $em->persist($player4);
                $em->flush($player4);*/

            }
            else
            {
                $user = $form->getData();
                $clan = $user->getClan();
                $password = $user->getPass();

                $clan = $em->getRepository('COCBundle:Clan')->find($clan->getId());
                $passwordClan = $clan->getPassword();

                if ( $passwordClan == $password)
                {
                    $user->setClan($clan);
                    $user->setVisited(0);
                    $em->persist($user);
                    $em->flush($user);

                }
                else
                {


                    $this->setFlash('error', 'Pas de passe incorrect.');
                    $route = 'fos_user_registration_register';
                    $url = $this->container->get('router')->generate($route);

                    return new RedirectResponse($url);
                }

            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route, array('id_clan' => $clan->getId()));
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }
}