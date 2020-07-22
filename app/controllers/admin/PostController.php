<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PostController extends BaseController {

    public function getIndex(){
        // admin/posts  or admin/posts/index
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();
        $blogpost = $query->fetchAll(\PDO::FETCH_ASSOC);
       // return render('../views/admin/posts.php', ['blogpost' =>$blogpost]);
       return $this->view('admin/posts.twig', ['blogpost' =>$blogpost]);

    }

    public function getCreate(){
        // Admin/posts/create
       // return render('../views/admin/insert-post.php');
       return $this->view('admin/insert-post.twig');
       
    }

    public function postCreate(){
        // Admin/posts/create POST method
        global $pdo;
        $sql = "INSERT INTO blog_posts (title, content) VALUES (:title, :content)";
                $query = $pdo->prepare($sql);
                
                $result = $query->execute([
                    'title'=> $_POST['title'],
                    'content' => $_POST['content']
                ]);
        
            //return render('../views/admin/insert-post.php',['result'=>$result]);
            return $this->view('admin/insert-post.twig',['result'=>$result]);
            

    }
}