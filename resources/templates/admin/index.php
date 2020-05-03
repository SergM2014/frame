<?php
//if ajax request than show only the nessacery file
    if(isset($ajax )OR isset($_POST['ajax'])){
        $view=$router->getView($view);
        include ($view);
        exit();
    }

//othervice output full site
    require_once "header.php";

    if(ENABLEJSTRANSLATION)  include PATH_SITE."/resources/languages/JsTranslation.php";

    $view=$router->getView($view);

    include_once ($view);
    require_once "footer.php";



