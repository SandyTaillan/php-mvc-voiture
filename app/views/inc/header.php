<!--app/views/inc/header-->
<?php require_once APPROOT . '/views/inc/head.php'; ?>
<body id="container">
            <header>
                <nav>
                    <a href="<?= URLROOT  ?>">
                        <img src="<?= URLROOT ?>/public/img/titre-accueil.png" width="250px" alt="titre voiture en folie">
                    </a>

                    <ul>
                        <li><a href="<?= URLROOT  ?>/pages/articles">Les articles</a></li>
                        <li><a href="<?= URLROOT  ?>/pages/about">À-propos</a></li>
<!--                        Si une cession est ouverte alors ne pas écrire le code pour le register et le login-->
                        <!--                juste pouvoir se déconnecter-->
                        <?php if(isset($_SESSION['user_id'])) : ?>
                            <li><a href="<?= URLROOT ?>/posts/index">Administration</a></li>
                            <li><a href="<?= URLROOT ?>/users/logout">Se déconnecter</a></li>
                        <?php else: ?>
                            <li><a href="<?= URLROOT  ?>/users/login">Se connecter</a></li>
                            <li><a href="<?= URLROOT  ?>/users/register">S'inscrire</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
