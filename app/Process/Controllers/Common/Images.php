<?php
namespace App\Process\Controllers\Common;




use App\Core\BaseController;
use App\Process\Models\Images as ModelImages;
use App\Lib\TokenService;

class Images  extends BaseController
  {
      public function __construct()
      {
          parent::__construct();
          TokenService::check('prozessImage');

      }

    public function uploadAvatar()
      {
          $message =  (new ModelImages)->uploadAvatar();

          echo json_encode($message);
          exit();
      }


      public function deleteAvatar()
      {
          $message = (new ModelImages())->deleteAvatar();

          echo json_encode($message);
          exit();
      }


      public function uploadManyItems()
      {
          $message = (new ModelImages())->uploadManyItems();

          echo json_encode($message);
          exit();
      }


    public function deleteManyItems()
    {
        $message = (new ModelImages())->deleteManyItems();

        echo json_encode($message);
        exit();
    }




  }
  