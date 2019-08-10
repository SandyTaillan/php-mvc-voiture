<!--/views/pages/single-->
    <?php
        require_once APPROOT . '/views/inc/head.php';
        require_once APPROOT . '/views/inc/header.php';
    ?>

    <div id="articles">
        <div class="single">
            <h1><?= $data['post']->titre1; ?></h1>
            <img src="<?= $data['post']->lien_img; ?>" width="500px" alt="">
            <p class="postdata postdata_single">
                Article de <?= $data['post']->name ; ?> créé le <?= $data['post']->date_creation; ?>
                dans la catégorie "<?= $data['post']->categorie ;?>"
            </p>
            <p class="single_texte">
                <?= $data['post']->article_text; ?>
            </p>
        </div>
    </div>
    <?php require_once APPROOT . '/views/inc/footer.php'; ?>
