<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\BaseController;

class IndexController extends BaseController{

    public function getIndex(){
        if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $user = User::find($userId);

            if($user){
                return $this->view('admin/index.twig',['user'=>$user]);
            }
        }

        header('Location: '.BASE_URL.'auth/login');
        
    }

}