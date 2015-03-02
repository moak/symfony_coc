<?php

namespace COC\COCBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class COCBundle extends Bundle
{
    private static $containerInstance = null;

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        parent::setContainer($container);
        self::$containerInstance = $container;
    }

    public static function getContainer() {
        return self::$containerInstance;
    }

}
