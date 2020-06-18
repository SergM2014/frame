<?php

$routes = [
    /*
     * 'route where parametr {dum1} are arguments for controller => 'controller itself@this action'
     *
     * '/article/{dum1}/update/{dum2}' => 'Controller2@update',
     *
     * routes in this file is to write without languages components
     *
     * to render correctly admim views '/admin' part must be always presented in route
     */

    /*
    '/article/{dum1}/show/{dum2}' => 'index@showArgs',
    '/images/uploadManyItems' => 'images@uploadManyItems',
    */



    '/'=>'Index@index',

    '/admin' => 'admin@index',
    '/admin/login' =>'admin@login',
    '/admin/exit' =>'admin@logout',



    '/images/uploadAvatar' =>'images@uploadAvatar',
    '/images/deleteAvatar' =>'images@deleteAvatar',

    '/image' => 'Index@showImage',

    '/popup/category/{id}' =>'popup@category',
    '/modal/show' =>'modal@show',



    '/addform' =>'form@index',
    '/storeform' => 'form@store',


    '/index/setTimeZone' => 'index@setTimeZone',


   
    '/listenbroadcast' => 'index@listenbroadcast',


];
