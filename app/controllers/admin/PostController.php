<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController {

    public function getIndex(){
        // admin/posts  or admin/posts/index
        $blogpost = BlogPost::all(); // return all post no ordered 
       return $this->view('admin/posts.twig', ['blogpost' =>$blogpost]);

    }

    public function getCreate(){
        // Admin/posts/create
        return $this->view('admin/insert-post.twig');
    }

    public function postCreate(){
        // Admin/posts/create POST method
        $errors = [];
        $result = false;
        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');

        if($validator->validate($_POST)){
            $blogPost =  new BlogPost([
                'title'=> $_POST['title'],
                'content' => $_POST['content']
            ]);
            $result = $blogPost->save(); 
        }else{
            $errors = $validator->getMessages();
        }

        return $this->view('admin/insert-post.twig',['result'=>$result,'errors'=>$errors]);
            

    }
}