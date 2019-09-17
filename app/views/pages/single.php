<!--/views/pages/single-->
    <?php
        require_once APPROOT . '/views/inc/header.php';
    ?>
    <div id="articles">
        <div class="single">
            <h1><?= $data['post']->title; ?></h1>
            <img src="<?= $data['post']->lien_img; ?>" width="500px" alt="">
            <p class="postdata postdata_single">
                Article de <?= $data['post']->name_aut; ?> créé le <?= $data['post']->date_crea; ?>
                dans la catégorie "<?= $data['post']->name_cate ;?>"<br>
                modifié le <?= $data['post']->modified_at; ?>
            </p>
            <p class="single_texte">
                <?= html_entity_decode($data['post']->text_art); ?>
            </p>
        </div>
    </div>
    <?php require_once APPROOT . '/views/inc/footer.php'; ?>
