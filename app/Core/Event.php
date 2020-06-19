<?php
namespace App\Core;


use Memcached;

 class Event
 {
  
    public static function fire($title = null, $additionalParameters = null){
        
       
        //check if the title is not null
         if(is_null($title)) return;
        $jsoned =  json_encode($additionalParameters);
        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $m -> set($title, $jsoned,3);
      
    }

    public static function listen(){
       
        $events = [];

        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $keys = $m ->getAllKeys();
        if($keys){
            foreach($keys as $key){
                $events [$key] = $m -> get($key);
            }
        }
        $m -> flush();

        return $events;
    }
     

     




 }
 
?>


 