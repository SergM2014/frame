<?php
namespace App\Core;


use Memcached;

 class Event
 {
  
    public  function fire($title = null, $additonalParameters = []){
        
       
        //check if the title is not null
         if(is_null($title)) return;

        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $m -> set($title, $additonalParameters,10);
      
    }

    public  function listen(){
       
      
        $events = [];

        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $arr = $m ->getAllKeys();
        $m -> flush();

        foreach ($arr as $key => $event){
            $events [$key] = json_encode($event);

        }

         return $events;

    }
     

     




 }
 
?>


 