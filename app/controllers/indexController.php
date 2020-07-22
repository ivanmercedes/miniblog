<?php

namespace App\Controllers;

class IndexController  extends BaseController{

    public function getIndex(){
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();
        $blogpost = $query->fetchAll(\PDO::FETCH_ASSOC);
    
        //return render('../views/index.php', ['blogpost' =>$blogpost]);
        return $this->view('index.twig', ['blogpost' =>$blogpost]);
    }
}