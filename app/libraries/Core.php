<!--app/libraries/core-->
<?php
    /**
     * Classe qui va permettre de créer des url et d'enregistrer les controllers
     * Le but est de faire des urls de cette forme : /controller/method/params
     * on va donc récupérer l'url en cours, on va la traiter -> function getUrl
     * on va ensuite traiter l'information dans la même fonction
     * On va vérifier que le premier mots après le nom du site est bien un controller (function construct)
     * puis on va appeler ce controller et l'instancier. (c'est une classe)
     * Ensuite, on va vérifier s'il y a bien un deuxième mot, cela sera notre méthode
     * Puis, s'il y a bien d'autres mots, cela sera nos paramètres.
     */
    class Core
 {
     protected $currentController = 'Pages';
     protected $currentMethod = 'index';
     protected $params = [];

     /**
      * Core constructor.
      * Appel de la fonction getUrl qui s'éxécutera à chaque appel de la classe
      * et donc à chaque appel de l'index.php et donc, à chaque chargement d'une page
      */
     public function __construct()
     {
         $url = $this->getUrl();

         // look in controllers for first value
         if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
             // if exists, set as controller
             $this->currentController = ucwords($url[0]);
             // Unset 0 Index -> destruction de la variable $url[0]
             unset($url[0]);
         }

         // Require the controller
         require_once '../app/controllers/' . $this->currentController . '.php';
         // Instantiate controller class
         $this->currentController = new $this->currentController;

         // Check for second part of url
         if(isset($url[1])){
             // check to see if method exists in controller
             if(method_exists($this->currentController, $url[1])){
                 $this->currentMethod = $url[1];

                 // Unset 1 Index -> destruction de la variable $url[1]
                 unset($url[1]);
             }
         }
         // Get params
         // Opérateur ternaire:
         $this->params = $url ? array_values(($url)) : [];
         // Call a callback with array of params
         call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
     }

     /**
      * Cette fonction a pour but :
      *     d'obtenir l'url en cours
      *     de retirer le dernier '/' sur cette url
      *     de sécuriser l'url
      *     de mettre chaque partie de l'url dans un array = $url
      *     ce qui donnera par exemple
      *     Array ( [0] => posts [1] => edit [2] => 1 )
      */
     public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
     }
 }
