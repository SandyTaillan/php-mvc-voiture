<!--app/views/pages/index-->

<!-- todo : Créer la page register et le Controllers Users -->
<!--todo : finir de créer la page About (écriture l'article) et faire l'appel dans le fichier Pages-->
<!--todo : mettre du volume sur les 3 blocs sur la page d'accueil avec de l'animation  et un voile de couleur sur les images-->
<!--todo : Changer la date de modification d'un article quand on l'update (voir cours SQL sur TIMESTANPS-->
<!--todo: Faire une table pour les images avec le contenu du alt  -->
<!--todo : Ajouter une zone de recherche -> apprendre comment faire en php-->
<!--todo: Rajouter la possibilité de faire une sélection par catégorie et par auteur pour tout public-->
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
                        <li><a href="<?= URLROOT  ?>/users/login">Se connecter</a></li>
                        <li> - </li>
                        <li><a href="<?= URLROOT  ?>/users/register">S'inscrire</a></li>
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
                                    <a href="/">
                                        <img src="<?= $post->lien_img ; ?>" width='450px' height='300px' alt="">
                                    </a>
                                </div>
                                <div class="index-texte">
                                    <li><p>Catégorie : <?= $post->categorie ; ?></p></li>

                                    <li><h2><?= $post->titre1 ; ?></h2></li>

                                    <li class="resume"><?= $post->resume ; ?></li>

                                    <li class="article-auteur"><i><?= $post->name; ?></i></li>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </section>
        </main>
        <?php require_once APPROOT . '/views/inc/footer.php'; ?>

