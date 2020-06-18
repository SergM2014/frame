<?php

namespace App\Process\Controllers\Common;



use App\Core\BaseController;
use App\Lib\HelperService;
use App\Lib\CheckFieldsService;

use App\Core\Event;



class Index  extends BaseController
  {

    use CheckFieldsService;

   /* public function showArgs($arg1, $arg2)
     {
       echo "this is showargs controller</br>";
       var_dump($arg1);
       dd($arg2);
     }*/


      /**
       * fire off he index action
       *
       * @return array
       */
      public function index()
    	{
        // $event = new Event();
        //  $event->fire('action1',['presentId' =>'1']);
        //  $event->fire('action2', ['presentId' => 2, 'someAction' => 'action2', 'additionalParametr' => 'something_else']);
        //  $event->fire('action3');
        return ['view'=>'views/common/index.php'];
      }


      public function showImage()
      {
          return ['view'=>'views/common/avatarImage.php'];
      }

      
      public function setTimeZone()
      {
        if(! date_default_timezone_set($_POST['timeZone'])) exit();
        

         $_SESSION['timeZone']['value'] = $_POST['timeZone'];
         $_SESSION['timeZone']['initTime'] = time();
         $response = ['timeZoneInitTime' => $_SESSION['timeZone']['initTime']];

         echo json_encode($response);
         exit();
      }

      public function listenbroadcast()
    	{
        
        return ['view'=>'views/common/listenbroadcast.php'];
      }








  }
  