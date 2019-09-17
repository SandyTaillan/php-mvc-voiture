<!--app/views/pages/about-->
<?php
require_once APPROOT . '/views/inc/head.php';
require_once APPROOT . '/views/inc/header.php';
?>

<?php if ($data['post']){ ?>

    <div id="articles">
        <div class="single">
            <h1><?= $data['title'] ?></h1>
            <img src="<?= $data['post']->lien_img; ?>" width="500px" alt="">
            <p class="single_texte">
                <?= html_entity_decode($data['post']->text_art); ?>
            </p>
            <p class="postdata postdata_single">
                Article de <?= $data['post']->name_aut ; ?>
            </p>
        </div>
    </div>
  <? }else{
    echo "Désolé, il n'y a pas de page À-propos";
} ?>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>
