<?php

namespace App\Process\Controllers\Admin;



use App\Core\BaseController;




class Modal  extends BaseController
{

    public function show()
    {
      
        return ['view' => 'views/admin/modal/output.php', 'ajax' => true ];
    }



}