<!--app/controllers/pages-->
<?php

    /**
     * classe pour les pages du site
     * Permet de définir les pages qui seront utilisées
     * et permet de définir les appels à la base de données avec les fonctions adéquates
     * Permet aussi de rajouter des informations qui ne sont pas dans la BDD via $data
     */
class Pages extends Controller
{
    /**
     * Pages constructor.
     * Appel le fichier /models/post dont le constructeur permet d'instancier la classe Database
     */
    public function __construct()
    {
       $this->postModel = $this->model("Post");
    }

    /**
     * Création de la page index
     * appel de la fonction gettroisarticles qui va chercher dans la BDD les 3 articles les plus récents
     * appel de la vue index.php en passant des paramètres via $data
     */
    public function index(){
        $posts = $this->postModel->gettroisarticles();
        $data = [
            'posts' => $posts
        ];

        $this->view('pages/index', $data);
    }

    /**
     * Création de la page article
     * Appel de la fonction getPosts qui va afficher tous les articles contenu dans la BDD
     * Appel de la vue /pages/articles en passant des paramètres via $data
     */
    public function articles(){
        $posts = $this->postModel->getPosts();
        $data = [
            'titre1' => 'tous nos articles',
            'posts' => $posts
        ];
        $this->view('pages/articles', $data);
    }


    /**
     * Création de la page About
     *
     */
    public function about(){
        $post = $this->postModel->getPostByTitle("about");
        $data = [
            'title' => "À  propos de ce site ...",
            'post'  => $post
        ];
        $this ->view('pages/about', $data);
    }

    /**
     * Création de la page single pour 1 article
     * Récupération du contenu de la BDD pour 1 article et ses commentaires
     *
     *
     */
    public function single($slug)
    {
        $ip = get_client_ip_server();
        $post = $this->postModel->getPostBySlug($slug);
        $id1 = ['monid' => $post];
        $id = $id1['monid']->id;
        $usercomment = $this->postModel->getCommentById($id);
        $data = [
            'slug'          => $slug,
            'post'          => $post,
            'usercomment'   => $usercomment
        ];


        #formulaire pour les commentaires de l'article
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $comment= [
                'com_auteur'    => trim($_POST['com_name']),
                'com_email'     => trim($_POST['com_email']),
                'com_contenu'   => trim($_POST['com_comment']),
                'ip_adresse'    => $ip,
                'com_approuv'   => "0",
                'id_article'    => $data['post']->id # todo : à modifier par $id
            ];

            // Validate Name
            if (empty($comment['com_auteur'])) {
                $data['name_err'] = "S'il vous plait, entrez un nom";
            }
            // Validate Email
            if (empty($comment['com_email'])) {
                $data['email_err'] = "S'il vous plait, entrez un email";
            }
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err'])
                && empty($data['confirm_password_err'])) {
                if ($this->postModel->addcomment($comment)) {
                    flash('Commentaire bien enregistré', 'Le commentaire est en attente de modération');
                } else {
                    die('Something went wrong');
                }
            }
        }
        $this->view('pages/single', $data);

    }
}

