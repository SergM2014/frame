<?php

namespace App\Process\Models;

use App\Core\DataBase;
use App\Lib\CheckFieldsService;





class CheckForm extends DataBase
{
    use CheckFieldsService;

    private $errors;
    private $inputs;

     public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    protected  function checkIfNotEmpty()
    {

        foreach ($this->inputs as $key => $field ){
            if(empty($field)){
                $this->errors[$key] = translate('emptyFieldL');
            }
        }
    }



    private  function checkOneFieldLength($field, $length)
    {
        if(strlen($this->inputs[$field]) < $length ) $this->errors[$field] = $this->errors[$field] ?? translate('notApropriateLengthL');
    }


    protected function checkAllFieldsLength($givenLengthArr)
    {
        foreach($givenLengthArr as $field => $length){
            $this->checkOneFieldLength($field, $length);

        }

    }


    protected  function checkIfEmail()
    {
        if(!filter_var(@$this->inputs['email'], FILTER_VALIDATE_EMAIL)) { $this->errors['email'] = $this->errors['email'] ?? translate('wrongEmailL');}

    }


    protected function checkGoogle2Captcha()
    {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //your site secret key
            $secret = CAPTCHA_SECRET_KEY;
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if(!$responseData->success):
                $this->errors['captcha'] = translate('clickCaptchaL');
            endif;
        else:
            $this->errors['captcha'] = translate('clickCaptchaL');;
        endif;



    }

    protected  function ifUniqueLogin(array $income, $errors)
    {
        $sql = "SELECT `id` FROM `users` WHERE `login`=?";
        $stmt = self::conn()->prepare($sql);
        $stmt->bindValue(1, $income['login']);
        $stmt->execute();
        $id = $stmt->fetchColumn();
        if($id)  $this->errors['login'] = $this -> errors['login'] ?? translate('repeatedLogin');
    }


    protected  function comparePasswordFields($field1, $field2)
    {
        if($field1 != $field2) {
            $this->errors['password2'] = $this->errors['password2'] ?? translate('notEqualRepeatedPasswordL');
        }
    }


    protected  function checkDownloadedFile()
    {
        if (@!$_SESSION['downloadFile']) {
            $this->errors['downloadFile'] =  $this->errors['downloadFile'] ?? translate('noFileL');
        }

    }

// here start checkform for array


//initialy the most important
    public  function checkFormEx()
    {
        $this->comparePasswordFields($this->inputs['password'], $this->inputs['password2']);
        $this->checkIfEmail();
        $this->checkIfNotEmpty();
        $this->checkAllFieldsLength(['name'=>2, 'email'=>7, 'password' => 6, 'password2' => 6, 'textarea' =>3]);
        $this->checkGoogle2Captcha();


        return $this->errors;
    }


    public function checkManyItemsForm()
    {
       $this->checkIfNotEmpty();

    }





}