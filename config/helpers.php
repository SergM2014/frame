<?php

use App\Lib\HelperService;
    /**
     * define if document root is in public folder or not
     * @return string
     */
        function getDocumentRoot()

        {
            $arr = explode('/', $_SERVER['DOCUMENT_ROOT']);
            if(in_array('public', $arr)){
            array_pop($arr);
            $document_root = implode('/', $arr);
            return $document_root;
            }
            return $_SERVER['DOCUMENT_ROOT'];
        }


// only in case if cannot overwrite root Folder ex as in case of free hosting
        function getCorrectLinkDocumentRoot($rootFolder = 'public')
        {
            $arr = explode('/', $_SERVER['DOCUMENT_ROOT']);
            if(!in_array($rootFolder, $arr)){

              return '/'.$rootFolder;
            }
            return '';
        }



        function dd($arg)
            {
                echo "<br>";
                echo "<pre>";
                 var_dump($arg);
                 echo "<br>";

                exit();
            }


        function subscripedUser()
        {
             $activeSubscribtion = $_SESSION['user']['activeSubscription']?? false;
             return !!$activeSubscribtion;
        }



        function loggedInUser()
        {
            $loggedInUser = $_SESSION['user']['login']?? false ;

            return !!$loggedInUser;
        }


       function displayPreviewImage($givenImage = null , $imageCustomType = null, $path = null )
       {

            if(@!$givenImage) {

               return $imageCustomType == 'avatar'? '/img/noavatar.jpg' : '/img/nophoto.jpg';
            }
            return $path.$givenImage;
       }


        function getCurrentLanguage()
        {
            $url =  trim($_SERVER['REQUEST_URI'], '/');

            //if string to explode then explode into array
            if(strripos($url, '/')!== false ) {
                $url = explode('/', $url);
                $lang= $url[0];
            }

            //if this is just a string
            if(is_string($url)){ $lang = $url;}

            $langs = HelperService::prozessLangArray();

            //check if the posible language is present in Language list
            if (array_key_exists($lang, $langs)){
                $currentLang = $lang;

                //make url cleaner
                if(is_string($url)) $url='';
                if(is_array($url)) {
                    array_shift($url);
                    if(count($url)==1) { $url= $url[0]; }
                }
            }
            else {
                $currentLang = DEFAULT_LANG;
            }

            return $currentLang;
        }




       function includeView($path)
       {
           include PATH_SITE.'/resources/languages/'. getCurrentLanguage().'.php';
           include   PATH_SITE."/resources/views$path";
       }


       //$path - file to be included, $imageCustomType - avatar/photo, $uploadfolder - folder where file to be uploaded
       //$givenImage - image taken from the $_POST['imageData']

        function includeImageUploadView($path, $imageCustomType = null, $uploadsFolder = null, $givenImage = null )
        {
            include PATH_SITE.'/resources/languages/'. getCurrentLanguage().'.php';
            include   PATH_SITE."/resources/views$path";
        }

        function translate($word)
        {
            include PATH_SITE.'/resources/languages/'. getCurrentLanguage().'.php';
            return $$word;

        }


         function getLanguageFileForJs()
            {

                $languageVar = file(PATH_SITE.'/resources/languages/'.getCurrentLanguage().'.php',  FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );

                $assocLanguageArr = [];
                foreach($languageVar as $item){

                    $arr = explode('=',$item);
                    if(count($arr)>=2) {
                        $key = str_ireplace(['$',' '], '', $arr[0]);
                        $value = str_ireplace(['"',"'", ';'],'',trim($arr[1]));
                        $assocLanguageArr[$key] = $value;
                    }
                }

                return $assocLanguageArr;
            }

