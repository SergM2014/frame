<?php

namespace App\Process\Models;


use App\Core\HighLevelDependency\ProcessImage;



class Images extends ProcessImage
{

    public function uploadAvatar(){

        $path = PATH_SITE.UPLOAD_FOLDER.AVATARS_IMAGES;

        $error =  $this->checkUploadFileErrors();
        if(!empty($error)) return $error;

        $name = $this->resizeImage($_FILES['file'], $path, AVATAR_IMAGES_EXTENT);

        // Загрузка файла и вывод сообщения
        if($name) {
            unset($_FILES['file']);

            $response=["message"=>"<span>".translate('loadIsSuccededL')."</span>", "success"=>true, "image"=> $name];
            chmod ($path.$name , 0777);
        }
        else {
            return $response =["message"=>"<span class=''>".translate('smthWentWrongL')." </span>", "error" => true];
        }

        return $response;
    }



    public function deleteAvatar ()
    {
//when deleting single avatar $_POST['imageData'] is empty
        $avatar = @$_POST['imageData'];
       // @ unlink ( PATH_SITE.UPLOAD_FOLDER.'avatars/'.$avatar);

        $response= ["message"=>"<span class=''>". translate('fileIsDeletedL')."</span>", "image"=> $avatar];
     

        return $response;
    }


    public function uploadManyItems(){

        $path = PATH_SITE.UPLOAD_FOLDER.MANY_ITEMS_IMAGES;

        $error =  $this->checkUploadFileErrors();
        if(!empty($error)) return $error;


        // Загрузка файла и вывод сообщения
        $name  = strtolower($_FILES['file']['name']);
        if( move_uploaded_file($_FILES['file']['tmp_name'], $path.$name)) {

            $response=["message"=>"<span class='image-upload--succeded'>".translate('loadIsSuccededL')."</span>", "success"=>true, "image"=> $name];
            chmod ($path.$name , 0777);

        }
        else {
            return $response =["message"=>"<span class='image-upload--failed'>".translate('smthWentWrongL')." </span>", "error" => true];
        }

        return $response;
    }



    public function deleteManyItems()
    {

        $response= ["message"=>"<span class='image-delete--succeded'>". translate('failIsDeletedL')."</span>"/*, "image"=> @$image*/];

        return $response;
    }

}