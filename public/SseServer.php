<?php
header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");


while (1){

    $events = [];

    $m = new Memcached();
    $m -> addServer('localhost', 11211);
    $keys = $m ->getAllKeys();
    if($keys){
        foreach($keys as $key){
            $events [$key] = $m -> get($key);
        }
    }
    $m -> flush();
      
    
    if($events){

   
    foreach($events as $action => $params){

      echo "event:$action\n";
      
      echo "data: $params";
      echo "\n\n";
      echo "id:".uniqid()."\n";

      ob_end_flush();
      flush();
    }
  } else {

    echo "event:ping\n";
      
    echo "data: 111";
    echo "\n\n";
    echo "id:".uniqid()."\n";
    ob_end_flush();
    flush();
  }
  
  sleep(1);
  }