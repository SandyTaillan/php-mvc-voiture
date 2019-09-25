<!--app/controllers/users-->
<?php
/**
 * Classe pour gérer les utilisateurs
 * Relation avec la Base de données
 * tout ce qui est enregistrement, login, mais aussi vérification des informations
 */
class Users extends Controller
{

    /**
     * Users constructor.
     *
     */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * Fonction permettant de récupérer les informations d'enregistrement d'un utilisateur
     * De vérifier ses informations et de faire la liaison avec la BDD
     */
    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'pseudo' => trim($_POST['pseudo']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'avatar' => trim($_POST['avatar']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Cette adresse email est déjà prise.';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            // Init data
            $data = [
                'name' => '',
                'pseudo' => '',
                'email' => '',
                'avatar' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    /**
     * fonction qui récupère les information de login tapé par un utilisateur
     * Ces informations sont vérifiés
     * si l'information est correcte -> renvoie vers une fonction de création de session
     * sinon, messages pour prévenir l'utilisateur qu'il ne peut pas se loguer
     */
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found

            } else {
                // User not found
                $data['email_err'] = 'No user found';

            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
//                Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }


        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    /**
     * @param $user
     * fonction de création d'une session utilisateur
     */
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id_aut;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name_aut;
        redirect('posts');
    }

    /**
     * fonction de suppression de la session en cours
     * suppression des variables de session et redirection vers la page de login
     */
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    /**
     * @return bool
     * fonction permettant de vérifier que l'utilisateur est bien loggé
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        // Get posts
        $posts = $this->userModel->getUsers();
        $data = [
            'posts' => $posts
        ];
        $this->view('users/index', $data);
    }

    /**
     * Cette fonction permet de modifier un nouvel auteur
     *
     *
     *
     * @param $id
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'name_aut' => trim($_POST['name']),
                'pseudo_aut' => trim($_POST['pseudo']),
                'email' => trim($_POST['email']),
                'avatar' => trim($_POST['avatar']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password'])
            ];
//             Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = "S'il vous plait, entrez un email";
            }
            // Validate Name
            if (empty($data['name_aut'])) {
                $data['name_err'] = "S'il vous plait, entrez un nom";
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = "S'il vous plait, entrez un mot de passe";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Le mot de passe doit avoir au moins 6 caractères';
            }
            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "S'il vous plait, entrez un mot de passe";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Le mot de passe ne fonctionne pas';
                }
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->editUsers($data)) {
                    flash('Modification réussie', 'Vous pouvez vous connecter');
                    redirect('users/');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/edit', $data);
            }
        } else {
            $post = $this->userModel->getUserById($id);
            if ($post->id_aut != $_SESSION['user_id']) {
                echo"Vous n'avez pas le droit de modifier cet auteur.";
                redirect("users");
            }
            $data = [
                'id' => $post->id_aut,
                'name' => $post->name_aut,
                'pseudo' => $post->pseudo_aut,
                'email' => $post->email,
                'password' => '',
                'avatar' => $post->avatar_aut
            ];
            $this->view('users/edit', $data);
        }
    }
}
