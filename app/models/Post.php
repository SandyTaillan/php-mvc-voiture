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
         * La fonction getPosts permet de récupérer toutes les données (sauf le texte complet de l'article  de la BDD
         *  pour tous les articles
         */
        public function getPosts()
        {
            $this->db->query("SELECT id, slug, title, resume, lien_img, name_cate, name_aut,
                                        DATE_FORMAT(created_at, '%d/%m/%Y') AS date_crea,
                                        DATE_FORMAT(modified_at, '%d/%m/%Y') AS modified_at
                                    FROM articles
                                    JOIN authors
                                        ON articles.id_authors = authors.id_aut
                                    ORDER BY articles.id DESC ;");
            return $this->db->resultSet();
        }

        /**
         * @return mixed
         * Cette fonction permet de récupérer le titre, le résumé, le lien de l'image à la une, la catégorie
         *  et le nom de l'auteur de l'article pour les 3 derniers articles écrits dans la BDD
         */
        public function gettroisarticles()
        {
            $this->db->query('SELECT id, slug, title, resume, lien_img, name_cate, name_aut
                                    FROM articles
                                    JOIN authors
                                        ON articles.id_authors = authors.id_aut
                                    ORDER BY articles.id DESC
                                    LIMIT 3;');
            return $this->db->resultSet();
        }

        /**
         * @param $id
         * @return mixed
         * Cette fonction permet de récupérer dans la base de données :
         *      Le titre de l'article, son image à la une, sa catégorie, le nom de son auteur, la date de création
         *      et l'article en lui même ainsi que l'id de l'utilisateur, ce qui est utilise pour le single de post..
         */
        public function getPostById($id)
        {
//            $this->db->query('SELECT articles.id, user_id, titre1, resume, lien_img, categorie, name,
//                                        date_creation, article_text
//                                    FROM articles
//                                    JOIN users ON articles.user_id = users.id
//                                    WHERE articles.id = :id');

            $this->db->query('SELECT id, id_aut, title, resume, lien_img, name_cate, name_aut, created_at, text_art
                                    FROM articles
                                    JOIN authors
                                        ON articles.id_authors = authors.id_aut
                                    WHERE id = :id');

            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function getPostByTitle($title_art)
        {
            $this ->db->query('SELECT id_aut, slug, lien_img, name_aut, text_art 
                                        FROM articles
                                        JOIN authors
                                            ON articles.id_authors = authors.id_aut   
                                        WHERE title = :title_art');

            $this->db->bind(':title_art', $title_art);
            $row = $this->db->single();
            return $row;
        }

        public function getPostBySlug($slug)
        {
            $this ->db->query('SELECT id, title, slug, text_art, resume,lien_img, id_aut, id_authors, name_aut, name_cate,
                                        DATE_FORMAT(created_at, \'%d/%m/%Y\') AS date_crea,
                                        DATE_FORMAT(modified_at, \'%d/%m/%Y\') AS modified_at
                                        FROM articles
                                        JOIN authors
                                            ON articles.id_authors = authors.id_aut 
                                        JOIN categories  
                                            ON articles.name_cate = categories.name_cat
                                        WHERE slug = :slug');

            $this->db->bind(':slug', $slug);
            $row = $this->db->single();
            return $row;
        }

        public function addPost($data)
        {
//            $this->db->query('INSERT INTO articles(titre1, resume, lien_img, categorie, user_id, article_text)
//                                    VALUES (:title, :resume, :lien_img, :categorie, :user_id, :body)');
            $this->db->query('INSERT INTO articles(title, slug, resume, text_art, lien_img, id_authors, name_cate)
                                    VALUES (:title, :slug, :resume, :body, :lien_img, :user_id, :categorie)');

            // bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':slug', $data['slug']);
            $this->db->bind(':resume', $data['resume']);
            $this->db->bind(':lien_img', $data['lien_img']);
            $this->db->bind(':categorie', $data['categorie']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);


            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query('UPDATE articles SET title = :title, slug = :slug, name_cate = :categorie, resume = :resume,
                    id_authors = :user_id, text_art = :body, lien_img = :lien_img, modified_at = NOW() WHERE slug = :slug');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':slug', $data['slug']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':resume', $data['resume']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':lien_img', $data['lien_img']);
            $this->db->bind(':categorie', $data['categorie']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getCategories()
        {
            $this->db->query("SELECT name_cat FROM categories");
            return $this->db->resultSet();
        }


    }
