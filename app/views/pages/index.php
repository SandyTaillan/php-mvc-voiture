<!--app/views/pages/index-->
<!--fixme: Problème avec la Table catégorie qui prend l'id comme entrée alors qu'elle devrait prendre le nom de la catégorie
            Cela rend la création d'article impossible : erreur database
            Je dois donc dans ce cas créer un appel à l'ensemble des catégories-->
<!--todo : finir de créer la page About (écriture l'article) et faire l'appel dans le fichier Pages-->
<!--todo : mettre du volume sur les 3 blocs sur la page d'accueil avec de l'animation  et un voile de couleur sur les images-->
<!--todo : Changer la date de modification d'un article quand on l'update (voir cours SQL sur TIMESTAMPS-->
<!--todo: Faire une table pour les images avec le contenu du alt  -->
<!--todo : Ajouter une zone de recherche -> apprendre comment faire en php-->
<!--todo: Rajouter la possibilité de faire une sélection par catégorie et par auteur pour tout public-->
<!--todo : Créer une page par catégorie-->
<!--todo : Créer une page par auteur-->
<!--todo : Après avoir créer des pages par catégories et par auteurs, permettre d'y avoir accès par la page d'accueil-->
<!--todo: Faire en sorte que s'il n'y a pas de resume, alors prendre les 150 premières lettres dans la BDD-->
<!--todo: faire en que dans la page article, il y ait une image à gauche puis à droite etc...-->
<!--todo : tout le site doit être web responsive-->
<!--todo : faire la mise en place des commentaires-->
<!--todo : Diminuer la taille de l'image à la une pour le single d'article-->
<!--todo : Mettre l'avatar de l'auteur dans le postmetadata du single d'article-->
<!--todo : Faire une page 404-->
<?php require_once APPROOT . '/views/inc/head.php'; ?>
    <body>
        <main class="index-container">
            <header id="index-header">
                <nav>
                    <a href="<?= URLROOT  ?>">
                        <img src="<?= URLROOT ?>/public/img/titre-accueil.png" alt="">
                    </a>

                    <ul>
                        <li><a href="<?= URLROOT  ?>/pages/articles">Les articles</a></li>
                        <li> - </li>
                        <li><a href="<?= URLROOT  ?>/pages/about">À-propos</a></li>
                        <li> - </li>
                        <!--   Si une cession est ouverte alors ne pas écrire le code pour le register et le login-->
                        <!--                juste pouvoir se déconnecter-->
                        <?php if(isset($_SESSION['user_id'])) : ?>
                            <li><a href="<?= URLROOT ?>/posts/index">Administration</a></li>
                            <li> - </li>
                            <li><a href="<?= URLROOT ?>/users/logout">Se déconnecter</a></li>
                        <?php else: ?>
                            <li><a href="<?= URLROOT  ?>/users/login">Se connecter</a></li>
<!--                            <li> - </li>-->
<!--                            <li><a href="--><?//= URLROOT  ?><!--/users/register">S'inscrire</a></li>-->
                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
            <section id="index-article">
                <nav>
                    <ul>
                        <?php
                        $i = 0;   // pour mettre une couleur différentes à chaque article
                        foreach ($data['posts'] as $post) :
                            $i++; ?>
                            <div class="index-bloc-article bloc bloc<?= $i; ?>">
                                <div class="img_art_une">
                                    <a href="<?= URLROOT ?>/pages/single/<?= $post->id ?>">
                                        <img src="<?= $post->lien_img ; ?>" width='450px' height='300px' alt="">
                                    </a>
                                </div>
                                <div class="index-texte">
                                    <li><p>Catégorie : <?= $post->name_cate; ?></p></li>

                                    <li>
                                        <a href="<?= URLROOT ?>/pages/single/<?= $post->id ?>">
                                            <h2><?= $post->title ; ?></h2>
                                        </a>
                                    </li>
                                    <li class="resume"><?= $post->resume ; ?></li>

                                    <li class="article-auteur"><i>Auteur : <?= $post->name_aut; ?></i></li>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </section>
        </main>
        <?php require_once APPROOT . '/views/inc/footer.php'; ?>
