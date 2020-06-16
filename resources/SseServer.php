<?php
header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");


//while (1) {
 
 
  foreach($events as $key => $event){

      echo "event: $key\n";
      echo "data: $event";
      echo "\n\n";
      echo "id:".uniqid()."\n";
  }


  
  // ob_end_flush();
   flush();
  sleep(3);
//}