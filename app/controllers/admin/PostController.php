<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
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
        $blogPost =  new BlogPost([
            'title'=> $_POST['title'],
            'content' => $_POST['content']
        ]);
        $blogPost->save();
        $result = true;
            //return render('../views/admin/insert-post.php',['result'=>$result]);
            return $this->view('admin/insert-post.twig',['result'=>$result]);
            

    }
}