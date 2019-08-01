<!--public/index.php-->
<?php
    // Récupérer la conficuration
    require_once '../app/config/config.php';

    // Load Helpers
    require_once '../app/helpers/url_helper.php';
    require_once '../app/helpers/session_helper.php';

    //Autoload Core Libraries = autochargeur de classes
    spl_autoload_register(function($className){
        require_once '../app/libraries/' . $className . '.php';
    });


    // Initialisation de la librairie Core qui gère les url.
    $init = new Core;
