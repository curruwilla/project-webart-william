<?php

namespace Source\Core;

use Source\Support\Variables;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;
use Source\Support\Log;
use Twig\TwigFunction;

/**
 * Class View
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package Source\Core
 */
class View
{
    /**
     * @param string $template
     * @param array  $replaces
     *
     * @param bool   $cache
     * @param bool   $debug
     *
     * @return false|string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $template, array $replaces, bool $cache = true, bool $debug = false)
    {
        try {
            return $this->instance($cache, $debug)->render("{$template}.twig", $replaces);
        } catch (LoaderError | SyntaxError | RuntimeError | \Exception $e) {
            (new Log(static::class))->error("Line: {$e->getLine()} - File: {$e->getFile()} - {$e->getMessage()}");
            return "";
        }
    }

    /**
     * @param bool $cache
     * @param bool $debug
     *
     * @return Environment
     */
    public function instance(bool $cache = true, bool $debug = false): Environment
    {
        $option = array();
        if ($cache) {
            if (!file_exists(CONF_PATH . "storage/themes/cache")) {
                mkdir(CONF_PATH . "storage/themes/cache", 0755);
            }

            $option["cache"] = CONF_PATH . "storage/themes/cache";
        }

        $option["debug"] = $debug;
        $option["optimizations"] = -1;
        $option["auto_reload"] = true;

        $twig = new Environment($this->loader(), $option);
        $twig->addExtension(new DebugExtension());
        $twig->addExtension(new Variables());

        $image = new TwigFunction('image', function (?string $image, int $width, ?int $height = null) {
            if (empty($image)) {
                return "";
            }

            return image($image, $width, $height);
        });

        $twig->addFunction($image);

        return $twig;
    }

    /**
     * Responsável por verificar arquivos do tema e carregar
     * @return ArrayLoader|FilesystemLoader
     */
    public function loader()
    {
        if (file_exists(CONF_PATH . "/themes/web")) {
            return new FilesystemLoader(CONF_PATH . "/themes/web");
        }

        return new ArrayLoader(array());
    }

    /**
     * Responsável por invocar as classes de templates, como Header, footer etc..
     *
     * @param string $class
     * @param string $function
     *
     * @return mixed
     */
    public function load(string $class, $function = "index")
    {
        $load = new $class;
        if ($function != "index") {
            return $load->$function();
        }

        return $load->index();
    }
}
