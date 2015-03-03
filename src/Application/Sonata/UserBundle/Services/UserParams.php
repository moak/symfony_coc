<?php

namespace Application\Sonata\UserBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\SecurityContext as SecurityContext;
use Doctrine\ORM\EntityManager;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;

class UserParams
{

    protected $security;
    protected $requestStack;
    protected $em;

    public function __construct(RequestStack $requestStack, SecurityContext $security, EntityManager $entityManager)
    {
        $this->requestStack = $requestStack;
        $this->security = $security;
        $this->em = $entityManager;
    }



    public function getLocale( $user = null) {
        $locale = null;


            $request = $this->requestStack->getCurrentRequest() ;
            $cookie = $request->cookies;

            if ($cookie->has('locale')) {
                $locale = $cookie->get('locale');
            }

            if ($locale == null && $this->security->getToken() !== null) {
                if (empty($user)) {
                    $user = $this->security->getToken()->getUser();
                }

                if ($user instanceof User) {
                    $locale = $user->getLocale();
                }
            }
        return $locale;
    }

    public function setLocale( $value) {
        if ($this->security->getToken() !== null) {
            $user = $this->security->getToken()->getUser();
            if ($user instanceof User) {
                $user->setLocale($value);
                $this->em->persist($user);
                $this->em->flush();
            }
        }
        setcookie('locale', $value, time() + 3600 * 24 * 7 * 365, '/');

    }
}
