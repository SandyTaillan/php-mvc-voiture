<!--app/views/pages/index-->

<!--todo : Diminuer la taille de l'image à la une pour le single d'article-->
<!--todo : Rectifier la taille du header sur /pages/articles-->
<!--todo : ajouter une catégorie fourre-tout genre divers-->

<!--todo : Faire une gestion des auteurs-->
<!--todo : Mettre l'avatar de l'auteur dans le postmetadata du single d'article-->
<!--todo : Faire une table pour les images avec le contenu du alt  -->
<!--todo : Ajouter une zone de recherche -> apprendre comment faire en php-->
<!--todo : Rajouter la possibilité de faire une sélection par catégorie et par auteur pour tout public-->
<!--todo : Créer une page par catégorie-->
<!--todo : Créer une page par auteur-->
<!--todo : Après avoir créer des pages par catégories et par auteurs, permettre d'y avoir accès par la page d'accueil-->
<!--todo : Faire en sorte que s'il n'y a pas de resume, alors prendre les 150 premières lettres dans la BDD-->
<!--todo : et faire en sorte que le résumé ne prennent pas plus de 150 caractères ou que ne s'affiche que 150caractères-->
<!--todo : faire en que dans la page article, il y ait une image à gauche puis à droite etc...-->
<!--todo : tout le site doit être web responsive-->
<!--todo : faire la mise en place des commentaires-->
<!--todo : Faire une page 404-->
<!--todo : Revoir la sécurité du site dans le fichier Posts -> add et edit. en fait, tout ce qui créé du contenu.-->
<!-- todo : revoir entièrement la gestion des images -->
<!-- todo : mettre un bonjour -> nom de l'utilisateur connecté pour savoir ou j'en suis-->
<!--todo : problème de mage sur posts/edit/nom-de-l'aritcle -> Résumé de l'article-->
<!--todo : Créer un slug automatique-->
<!--todo : voir comment est géré la mise en valeur des images d'article-->
<!--todo : du code dans Users -> register et  Users -> edit est en double (vérification) voir pour faire des fonctions-->


<!--.professor-card__image {-->
<!--display: block;-->
<!--transition: opacity .3s ease-out, -webkit-transform .3s ease-out;-->
<!--transition: opacity .3s ease-out, transform .3s ease-out;-->
<!--transition: opacity .3s ease-out, transform .3s ease-out, -webkit-transform .3s ease-out;-->
<!--}-->
<!---->
<!--.professor-card:hover .professor-card__image {-->
<!--opacity: .80;-->
<!---webkit-transform: scale(1.1) rotate(4deg);-->
<!--transform: scale(1.1) rotate(4deg);-->
<!--}-->





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
                            <div class="index-bloc-article ">
                                <div class="img_art_une sepia">
                                    <a href="<?= URLROOT ?>/pages/single/<?= $post->id ?>">
                                        <img src="<?= $post->lien_img ; ?>" width='450px' height='300px' alt="">
                                    </a>
                                </div>
                                <div class="index-texte bloc bloc<?= $i; ?>">
                                    <li><p>Catégorie : <?= $post->name_cate; ?></p></li>

                                    <li>
                                        <a href="<?= URLROOT ?>/pages/single/<?= $post->id ?>">
                                            <h2><?= $post->title ; ?></h2>
                                        </a>
                                    </li>
                                    <li class="resume"><?= html_entity_decode($post->resume) ; ?></li>

                                    <li class="article-auteur"><i>Auteur : <?= $post->name_aut; ?></i></li>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </section>
        </main>
        <?php require_once APPROOT . '/views/inc/footer.php'; ?>
