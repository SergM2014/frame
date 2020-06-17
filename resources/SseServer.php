<?php
header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");

 
  if(($events)){
    echo "event:test\n";
    echo "data: testing";
    echo "\n\n";
    echo "id:".uniqid()."\n";
  }
 
 
  foreach($events as $action => $params){

      echo "event:$action\n";
      
      echo "data: $params";
      echo "\n\n";
      echo "id:".uniqid()."\n";
  }

  ob_end_flush();
  // flush();
