<?php

namespace App\Process\Controllers\Common;



use App\Core\BaseController;


use App\Core\Event;





class SseServer  extends BaseController
  {
    public function broadcast()
    {
        
        $event = new Event();
        $events = $event->listen();
         include_once PATH_SITE.'/resources/SseServer.php';
         exit();
    }

  }