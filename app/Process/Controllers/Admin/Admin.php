<?php

namespace App\Process\Controllers\Admin;



use App\Core\BaseController;
use App\Process\Models\AdminModel;
use App\Lib\TokenService;


class Admin  extends BaseController
  {

    public function index($errors = null )
	{

      if(!isset($_SESSION['admin'])) $noTemplate = true;

      return ['view'=>'views/admin/index.php', 'noTemplate'=> @$noTemplate, 'errors'=>$errors];
    }


    public function login()
    {
        TokenService::check('admin');
        AdminModel::getAdminUser();

        $credentialsSended = @$_POST['_token']? true : false;

        if(!isset($_SESSION['admin'])){
            return $this->index($errors = $credentialsSended);
        }


        return ['view'=>'views/admin/index.php' ];
    }


    public function logout()
    {
        TokenService::check('admin');
        unset($_SESSION['admin']);

        return ['view'=>'views/admin/index.php','noTemplate'=>true];
    }













  }
  