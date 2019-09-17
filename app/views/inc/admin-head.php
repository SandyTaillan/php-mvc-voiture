<!--views/inc/head-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?= URLROOT ?>/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#body'
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URLROOT ?>/css/style.css">
    <title>Document</title>

</head>

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
