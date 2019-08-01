<!--app/models/Post-->
<?php

    /**
     * La classe post permet de passer les requêtes à la base de données pour tout ce qui liés aux articles
     */
    class Post
    {
        private $db;

        /**
         * constructeur de la classe Post
         * Permet d'instancier la classe Database
         */
        public function __construct()
        {
            $this->db = new Database;
        }

        /**
         * @return mixed
         * La fonction getPosts permet de récupérer toutes les données  de la BDD pour tous les articles
         */
        public function getPosts(){
            $this->db->query("SELECT * FROM articles");
            return $this->db->resultSet();
    }

        /**
         * @return mixed
         * Cette fonction permet de récupérer le titre, le résumé, le lien de l'image à la une, la catégorie
         *  et le nom de l'auteur de l'article pour les 3 derniers articles écrits dans la BDD
         */
        public function gettroisarticles(){
            $this->db->query('SELECT titre1, resume, lien_img, categorie, name FROM articles
                                    JOIN users
                                        ON articles.user_id = users.id
                                    ORDER BY articles.id DESC
                                    LIMIT 3;');
            return $this->db->resultSet();
        }
    }
