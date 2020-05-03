<?php

namespace App\Process\Controllers\Common;



use App\Core\BaseController;
use App\Lib\CheckFieldsService;
use App\Lib\TokenService;
use App\Process\Models\CheckForm;



class Form  extends BaseController
{

    use CheckFieldsService;


    public function index($errors = null, $inputs = null )
    {
        $_SESSION['addForm'] = true;

        return ['view'=>'views/common/addFormEx.php', 'errors'=>$errors, 'inputs' =>$inputs ];
    }




    public function store()
    {
        if(@!$_SESSION['addForm']) return $this->index();
        TokenService::check('addForm');
        $cleanedUpInputs = self::escapeInputs( 'name', 'email', 'password', 'password2', 'textarea');

        $errors = (new CheckForm($cleanedUpInputs))->checkFormEx();

        if(!empty($errors)) {
            return $this->index($errors, $cleanedUpInputs);
        };

        return $this->formCreated();
    }



    public function formCreated()
    {
        if(!@$_SESSION['addForm']){ return $this->index(); }
        unset($_SESSION['addForm']);

        return ['view'=>'views/common/formAdded.php'];

    }


}
