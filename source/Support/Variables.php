<?php

namespace Source\Support;

use Source\Core\Session;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Class Variables
 * @author William Alvares <william@uilia.com.br>
 * @package Source\Support
 */
class Variables extends AbstractExtension implements GlobalsInterface
{
    /**
     * @return array
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getGlobals(): array
    {
        return array(
            "base" => url(),
            "theme_path" => url() . "/" . INCLUDE_PATH,
            "flash" => flash(),
            "csrf_input" => csrf_input()
        );
    }
}
