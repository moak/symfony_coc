<?php

namespace COC\COCBundle\Services;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use COC\COCBundle;
use COC\VitrineBundle;

class LanguageListener
{
    private $userParams;
    private $lastRoute;

    public function __construct($userParams)
    {
        $this->userParams = $userParams;
    }
    public function setLocale(GetResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }
        $request = $event->getRequest();
        $this->checkLocale($request);
    }

    private function checkLocale($request)
    {

        $path = explode('/', $request->getUri());

        $position = 3;
       // $env = COCCOCBundle::getContainer()->get('kernel')->getEnvironment();

        if (strstr($path[2], "localhost"))
        {
            $position = 6;
       /* } elseif (in_array($env, array('test', 'dev'))) {
            $position = 5;*/
        }

      //  $container = COCCOCBundle::getContainer();

       // $supportedLanguage = $container->getParameter('supported_locale') ;

        $supportedLanguage = array("en", "fr");

        // si c'est pas dans l'url => local
        // url => user ==> cookie , si le tout est nul => getPref browser
        if (!in_array($path[$position], $supportedLanguage)) {
            $locale = $this->userParams->getLocale(false);


            if ($locale == null) {
                // navigateur
                $locale = $request->getPreferredLanguage($supportedLanguage);
                $this->userParams->setLocale( $locale);
            }
            // look url
        } else {
            $locale = $path[$position];
        }

       /* $route = $request->attributes->get('_route');
       $this->lastRoute = $route;
        if ($userparams->getLocale(false) !== $locale && strpos($route, 'google') === false && strpos($this->lastRoute, 'google') === false) {
            $userparams->setParam('locale', $locale);
        }*/

        if ($request->getLocale() !== $locale) {
            $request->setLocale($locale);
        }

        return $locale;
    }
}