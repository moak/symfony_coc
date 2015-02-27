<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use COC\COCBundle\Entity\Clan;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecurityController extends Controller
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }


    public function loginAction(Request $request)
    {
        // user can't login if already loggued
        if ($this->container->get('security.context')->isGranted('ROLE_USER'))
        {
            $user = $this->get('security.context')->getToken()->getUser();
            $url = $this->container->get('router')->generate('coc', array('id_clan' => $user->getClan()->getId()));

            var_dump($url);
            die;
            return new RedirectResponse($url);
        }



        // try to redirect to the last page, or fallback to the homepage
        /*if ($this->container->get('session')->has($key)) {
            $url = $this->container->get('session')->get($key);
            $this->container->get('session')->remove($key);
        }
        */

        $key = '_security.main.target_path';
        if ($this->container->get('session')->has($key))
        {
            $user = $this->get('security.context')->getToken()->getUser();
            $url = $this->container->get('router')->generate('coc', array('id_clan' => $user->getClan()->getId()));


            return new RedirectResponse($url);
        }

        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();
        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }
        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);
        $csrfToken = $this->has('form.csrf_provider')
            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        if($this->getUser()){
            $user = $this->get('security.context')->getToken()->getUser();
            return $this->redirect($this->generateUrl('coc', array('id_clan' => $user->getClan()->getId())));
        }

        return $this->render('FOSUserBundle:Security:login.html.twig', $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}