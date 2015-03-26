<?php

namespace COC\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Lunetics\LocaleBundle\Event;
use Lunetics\LocaleBundle\Switcher;



class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        /*$locale =  $user = $this->getUser()->getLocale();
        $localeSwitchEvent = new FilterLocaleSwitchEvent($request, $locale);
        $this->dispatcher->dispatch(LocaleBundleEvents::onLocaleChange, $localeSwitchEvent);
*/
        $em = $this->getDoctrine()->getManager();
        $clans = $em->getRepository('COCBundle:Clan')->findBy(array('status' => array(0, 1)), array('totalGeneral' => 'DESC'));
        return $this->render('VitrineBundle:Default:index.html.twig', array('clans' => $clans));
    }

}
