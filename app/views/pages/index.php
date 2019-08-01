<!--app/views/pages/index-->

<!-- todo : Créer la page register et le Controllers Users -->
<!--todo : finir de créer la page About (écriture l'article) et faire l'appel dans le fichier Pages-->
<?php require_once APPROOT . '/views/inc/head.php'; ?>

    <body class="index-container">
        <header id="index-header">
            <nav>
                <a href="<?= URLROOT  ?>">
                    <img src="/php-mvc-voiture2/public/img/logo-voiture.png" alt="titre voiture en folie">
                </a>

                <ul>
                    <li><a href="<?= URLROOT  ?>/pages/articles">Les articles</a></li>
                    <li><a href="<?= URLROOT  ?>">À-propos</a></li>
                    <li><a href="<?= URLROOT  ?>/users/login">Se connecter</a></li>
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
                            <li><p>Catégorie : <?= $post->categorie ; ?></p></li>
                            <li><h2><?= $post->titre1 ; ?></h2></li>
                            <li class="resume"><?= $post->resume ; ?></li>
                            <li class="article-auteur"><i><?= $post->name; ?></i></li>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </section>
    </body>
</html>
