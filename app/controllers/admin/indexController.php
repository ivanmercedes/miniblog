<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class IndexController extends BaseController{

    public function getIndex(){
        // return render('../views/admin/index.php');
        return $this->view('admin/index.twig');
    }

}