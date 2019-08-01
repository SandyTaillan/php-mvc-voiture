<!--app/libraries/controllers-->
<?php
    /**
     * contrôleur de base
     * permet de rajouter les fichiers models et view
     */
    class Controller
    {
        /**
         * Rajoute le fichier model
         *
         * @param $model
         * @return mixed
         */
        public function model($model){
            // require model file
            require_once '../app/models/' . $model . '.php';

            // Instatiate model
            return new $model();
        }

        /**
         * enregistre la vue
         * $data représente des valeurs dynamiques que nous transmettons à travers les view
         *
         * @param $view
         * @param array $data
         *
         */
        public function view($view, $data = []){
            //check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                // view do not exist
                die(" La vue n'existe pas");
            }
        }
    }
