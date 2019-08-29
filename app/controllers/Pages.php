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
        $data = [
            'title' => 'Qui est Sandy Taillan ?'
        ];
        $this ->view('pages/about', $data);
    }

    /**
     * Création de la page single pour 1 article
     *
     */
    public function single($id){
        $post = $this->postModel->getPostById($id);
        $data = [
                'post' => $post
        ];
        $this->view('pages/single', $data);
    }
}
