<?php

namespace App\Controllers;

use App\Models\BlogPost;

class IndexController  extends BaseController{

    public function getIndex(){
        $blogpost = BlogPost::query()->orderBy('id','desc')->get();

        return $this->view('index.twig', ['blogpost' =>$blogpost]);
    }
}