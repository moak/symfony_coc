<?php
namespace COC\COCBundle\LocaleGuesser;

use Symfony\Component\HttpFoundation\Request;
use Lunetics\LocaleBundle\LocaleGuesser\LocaleGuesserInterface;
use Lunetics\LocaleBundle\Validator\MetaValidator;

class CocLocaleGuesser implements LocaleGuesserInterface
{
    private $identifiedLocale;

    private $metaValidator;

    public function guessLocale(Request $request)
    {
        // Code to identify the locale, if found:
        if ($this->metaValidaor->isAllowed($foundLocale)) {
            $this->identifiedLocale = $foundLocale;
            return $this->identifiedLocale;
        }
        else{
            echo "WTF";
        }

        return false;
    }

    public function getIdentifiedLocale()
    {
        return $this->identifiedLocale;
    }
}