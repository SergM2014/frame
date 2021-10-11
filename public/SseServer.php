<?php
header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");


while (1){

    $m = new Memcached();
    $m -> addServer('localhost', 11211);

    $events = unserialize($m->get('events'));
    $m -> delete('events');
   
      
    
    if($events){

   
        foreach($events as $action => $params){

            echo "event:$action\n";
            
            echo "data: $params";
            echo "\n\n";
            echo "id:".uniqid()."\n";

            ob_end_flush();
            flush();
            
          }
        }
         else 
         {

          echo "event:ping\n";
            
          echo "data: 111";
          echo "\n\n";
          echo "id:".uniqid()."\n";
          ob_end_flush();
          flush();
        }
  
  sleep(1);
  }