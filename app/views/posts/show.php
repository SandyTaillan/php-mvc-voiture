<!--/posts/show/id-->
<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id="administration">
        <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
        <div class="single-admin">
            <div id="menu-show">
                <a href="<?php echo URLROOT; ?>/posts" class="btn normal">Retour admin</a>
                <?php if($data['post']->id_aut == $_SESSION['user_id']) : ?>
                    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->slug; ?>" class="btn normal">
                        Edition article
                    </a>
                    <form class="btn" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>"
                          method="post">
                        <input type="submit" value="Delete" class="btn danger">
                    </form>
                <?php endif; ?>
            </div>
            <hr>

            <div class="single-admin-show">
                <div class="single-admin-art">
                    <h1><?= $data['post']->title; ?></h1>
                    <img src="<?= $data['post']->lien_img; ?>" width="500px" alt="">
                    <p class="postdata postdata_single">
                        Article de <?= $data['post']->name_aut ; ?> créé le <?= $data['post']->date_crea; ?>
                        dans la catégorie "<?= $data['post']->name_cate ;?>"<br>
                        modifié le <?= $data['post']->modified_at; ?>

                    </p>
                    <p class="single_texte">
                        <?= html_entity_decode($data['post']->text_art); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
