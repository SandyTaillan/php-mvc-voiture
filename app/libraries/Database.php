<!--app/libraries/Database-->
<?php

    /**
     * Classe Database pour gérer le PDO
     * Sert à :
     *      se connecter à la base de données
     *      créer des déclarations préparées
     *      bind values
     *      return rows and results
     *
     * gestionnaire de base de données : sdbh
     * gestionnaire de déclaration : $stmt
     * gestion des erreurs sur la BDD : $error
     *
     */
    class Database
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            // set DSN -> connection à la base de données
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        /**
         * @param $sql
         * fonction pour gérer l'état de préparation d'un envoi à la BDD
         *
         */
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        // execute the prepared statement

        /**
         * @return mixed
         * fonction d'exécution d'envoi des données à la BDD
         */
        public function execute(){
            return $this->stmt->execute();
        }

        /**
         * @return mixed
         * Get result set as array of objects = permet d'obtenir le résultat quand on veut un fetchAll (array)
         * Permet de récupérer un array de la BDD
         */
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        /**
         * @return mixed
         * Get single record as object (permet d'obtenir un row quand on veut juste 1 résultat
         * dans une variable simple
         */
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
            // Get row count
        public function rowCount(){
          return $this->stmt->rowCount();
        }
    }
