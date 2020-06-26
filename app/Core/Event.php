<?php
namespace App\Core;


use Memcached;

 class Event
 {
  
    public static function fire($title = null, $additionalParameters = null)
    {
        //check if the title is not null
          if(is_null($title)) return;
        $_SESSION['events'][$title] = json_encode($additionalParameters);
      
    }

    public static function save()
    {
        if(empty($_SESSION['events'])) return;

        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $m -> set('events', serialize($_SESSION['events']),3); 
        unset ($_SESSION['events']);
    }

    public static function listen()
    {
        $m = new Memcached();
        $m -> addServer(HOST, 11211);
        $events = unserialize($m->get('events'));
        $m -> delete('events');

        return $events;
    }
     

     




 }
 
?>


 