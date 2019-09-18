<!--app/controllers/Posts-->
<?php


class Posts extends Controller{
    /**
     * Posts constructor.
     * Redirection de l'utilisateur s'il n'a pas ouvert une session;
     * et appel de la class Post gérant la BDD
     */
    public function __construct(){
        if (!isloggedIn()){
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index(){
        // Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING );
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS );
            $data = [
                'title' => trim($_POST['title']),
                'slug' => trim($_POST['slug']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'resume' => trim($_POST['resume']),
                'lien_img' => trim($_POST['lien_img']),
                'categorie' => trim($_POST['categorie']),
                'title_err' => '',
                'body_err' => ''
            ];

            // validate data
            if (empty($data['title'])){
                $data['title_err'] = 'entrez un titre SVP';
            }
            if (empty($data['body'])){
                $data['body_err'] = "S'il vous plait, entrez le texte de l'article";
            }

            // make sure no errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                //validated
                if($this->postModel->addPost($data)){
                    flash('post_message', 'Post added');
                    redirect('posts');
                } else {
                    die('something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }
        } else {
            $posts = $this->postModel->getCategories();
            $data = [
                'title' => '',
                'body' => '',
                'posts' => $posts
            ];
            $this->view('posts/add', $data);
        }
    }
    public function edit($slug){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS );

            $data = [
                'id'        => $id,
                'title'     => trim($_POST['title']),
                'slug'      => trim($_POST['slug']),
                'body'      => trim($_POST['body']),
                'resume'    => trim($_POST['resume']),
                'lien_img'  => trim($_POST['lien_img']),
                'categorie'  => trim($_POST['categorie']),
                'user_id'   => $_SESSION['user_id'],
                'title_err' => '',
                'body_err'  => ''
            ];
            echo "tout se passe bien";
            // validate data
            if (empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
            }

            // make sure no errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                //validated
                echo "update";
                if($this->postModel->updatePost($data)){
                    flash('post_message', 'Post updated');
                    redirect('posts');
                } else {
                    die('something went wrong');
                }

            } else {
                // Load view with errors
                echo "Il y a une erreur";
                $this->view('posts/edit', $data);

            }
        } else {
            // Get existing post from model
            $post = $this->postModel->getPostBySlug($slug);
            $posts_cat = $this->postModel->getCategories();
            // Check for owner


            if ($post->id_aut != $_SESSION['user_id']){
                redirect("posts");
            }
            $data = [
                'id'            => $post->id,
                'user_id'       => $post->id_aut,
                'slug'          => $slug,
                'title'         => $post->title,
                'resume'        => $post->resume,
                'body'          => $post->text_art,
                'categorie'     => $post->name_cate,
                'lien_img'      => $post->lien_img,
                'posts_cat'     => $posts_cat
            ];
            $this->view('posts/edit', $data);
        }
    }

    public function show($slug){
        $post = $this->postModel->getPostBySlug($slug);
        $user = $this->userModel->getUserById($post->id_authors);
        $data = [
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/show', $data);
    }

    public function delete($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $post = $this->postModel->getPostById($id);
            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect("posts");
            }
            if ($this->postModel->deletePost($id)){
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }
    public function categories(){
        // Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/categories', $data);
    }

}

