<?php

namespace Framework;

use Framework\Template;

class Controller{

    protected $twig;
    protected $fileTemplate;

    public function __construct() {
        $this->twig = new Template();
    }
}