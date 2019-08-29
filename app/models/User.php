<!--app/models/User.php-->
<?php
    class User{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        // Register User
        public function register($data){
            $this->db->query('INSERT INTO authors(name_aut, email, password) VALUES (:name, :email, :password)');
            // bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Login User
        public function login($email, $password){
            $this->db->query('SELECT * FROM authors WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }
        // find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM authors WHERE email = :email');
            //bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // check row
            if ($this->db->rowCount() > 0){
                return true;
            } else{
                return false;
            }
        }
          // Get User by ID
        public function getUserById($id){
          $this->db->query('SELECT * FROM authors WHERE id_aut = :id');
          // Bind value
          $this->db->bind(':id', $id);
          $row = $this->db->single();
          return $row;
        }

        public function getUsers()
        {
            $this->db->query("SELECT id_aut, name_aut, pseudo_aut, avatar_aut, email, DATE_FORMAT(created_aut, '%d/%m/%Y') 
                                    AS date_crea FROM authors
                                    ORDER BY id_aut DESC;");
            return $this->db->resultSet();
        }
        public function editUsers()
        {
            $this->db->query("UPDATE authors SET id_aut = :id, name_aut = :name_aut
                                    WHERE id_aut = :id");
            // Bind values
            $this->db->bind(':id', $data['id']);
            $row = $this->db->single();
            return $row;
        }
    }
