<?php

namespace App\Controllers;


class  BaseController {

    protected $templateEngine;

    public function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine = new \Twig\Environment($loader,[
            'debug' => true,
            'cache'=> false
        ]);

        $filter = new \Twig\TwigFilter('url', function ($path) {
            return BASE_URL.$path;
        });
        
        $this->templateEngine->addFilter($filter);
    }

    public function view($fileName, $data = []){
        return $this->templateEngine->render($fileName,$data);
    }
}