<?php

namespace Source\Support;

use CoffeeCode\Optimizer\Optimizer;

/**
 * Class Seo
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package Source\Core
 */
class Seo
{
    /**
     * @var false|string[]
     */
    private $path;
    /**
     * @var mixed|string|null
     */
    private ?string $file;
    /**
     * @var mixed|string|null
     */
    private ?string $link;
    /**
     * @var mixed|string|null
     */
    private $key;
    /**
     * @var
     */
    private ?string $schema;
    /**
     * @var string|null
     */
    private ?string $title;
    /**
     * @var
     */
    private ?string $description;
    /**
     * @var
     */
    private ?string $image;

    /**
     * Seo constructor.
     *
     */
    public function __construct()
    {
        $route = filter_input(INPUT_GET, "route");
        $getURL = substr(strip_tags(trim($route)), 1);

        $this->path = explode('/', empty($getURL) ? 'home' : $getURL);
        $this->file = !empty($this->path[0]) ? $this->path[0] : null;
        $this->link = !empty($this->path[1]) ? $this->path[1] : null;
        $this->key = !empty($this->path[2]) ? $this->path[2] : null;

        $this->setPath();
    }

    /**
     * Função responsável por definir as meta-tags das páginas
     */
    private function setPath(): void
    {
        if ($this->file == 'home') {
            //INDEX
            $this->schema = 'WebSite';
            $this->title = CONF_SITE_NAME . " - " . CONF_SITE_TITLE;
            $this->description = CONF_SITE_DESC;
            $this->image = url() . '/storage/images/default.png';
        } else {
            //404
            $this->set404();
        }
    }

    /**
     * Função responsável por definir meta-tags para as páginas não encontradas na func setPath()
     */
    private function set404()
    {
        $this->schema = 'WebSite';
        $this->title = "Oppsss, nada encontrado! - " . CONF_SITE_NAME;
        $this->description = CONF_SITE_DESC;
        $this->image = url() . '/storage/images/default.png';
    }

    /**
     * @return Optimizer|null
     */
    public function getSeo(): ?Optimizer
    {
        $url = url() . "/" . implode("/", $this->path);

        return (new Optimizer())->optimize(
            $this->title ?? "",
            $this->description ?? "",
            $url ?? "",
            $this->image ?? ""
        )->openGraph(
            CONF_SITE_NAME,
            "pt_BR",
            $this->schema
        );
    }

    /**
     * @return false|string[]
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getSchema(): ?string
    {
        return $this->schema;
    }

    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage(): ?string
    {
        return $this->image;
    }
}
