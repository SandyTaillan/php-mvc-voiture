<!--app/views/inc/header-->
<?php require_once APPROOT . '/views/inc/head.php'; ?>
<body id="container">
            <header>
                <nav>
                    <a href="<?= URLROOT  ?>">
                        <img src="/php-mvc-voiture2/public/img/logo-voiture.png" alt="titre voiture en folie">
                    </a>

                    <ul>
                        <li><a href="<?= URLROOT  ?>/pages/articles">Les utilisateurs</a></li>
                        <li><a href="<?= URLROOT  ?>/pages/about">Les articles</a></li>
                        <li><a href="<?= URLROOT  ?>/pages/about">Les catégories</a></li>
<!--                        Si une cession est ouverte alors ne pas écrire le code pour le register et le login-->
                        <!--                juste pouvoir se déconnecter-->

                            <li><a href="<?= URLROOT ?>/users/logout">Se déconnecter</a></li>
                    </ul>
                </nav>
            </header>
