<?php

namespace Source\Core;

use Source\Support\Message;

/**
 * Class Controller
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package Source\Core
 */
class Controller
{
    /** @var View */
    protected View $view;

    /** @var Message */
    protected Message $message;

    /**
     * @var array|null
     */
    protected ?array $replaces;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->replaces = array();
        $this->view = new View();
        $this->message = new Message();
    }
}