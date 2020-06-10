<?php

namespace App\Core;




 class Event
 {
    private $title;

    private $presentId;

    private $action;

    private $additonalParameter;

    //  public function __construct($title = null, $id = null, $action = null, $additonalParametr = null)
    //  {
    //     @session_start();

        
    //  }

    public function fire($title = null, $presentId = null, $action = null, $additonalParameter = null){
        //check if the session is running
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //check if the title is not null
        if(is_null($title)) return;


        //initialize sesion with the pesent datas
        $presentDatas = compact($presentId, $action, $additonalParameter);
        $_SESSION['event'][$title][$presentDatas];

    }

    public function listen(){

    }
     

     




 }
 
?>