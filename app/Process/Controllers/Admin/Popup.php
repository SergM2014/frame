<?php

namespace App\Process\Controllers\Admin;



use App\Core\BaseController;




class Popup  extends BaseController
{

    public function category($id)
    {
      /*   print_r($id);
        exit(); */
        return ['view' => 'views/admin/popup/category.php', 'ajax' => true, 'id'=>$id ];
    }



}