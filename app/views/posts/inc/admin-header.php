<!--app/views/inc/header-->
<?php require_once APPROOT . '/views/inc/head.php'; ?>
<body id="container">
            <header>
                <nav>
                    <a href="<?= URLROOT  ?>">
                        <img src="/php-mvc-voiture/public/img/titre-accueil.png" width="300px" alt="titre voiture en folie">
                    </a>

                    <ul>
<!--                        Si une cession est ouverte alors ne pas écrire le code pour le register et le login-->
                        <!--                juste pouvoir se déconnecter-->

                            <li><a href="<?= URLROOT ?>/users/logout">Se déconnecter</a></li>
                    </ul>
                </nav>
            </header>
