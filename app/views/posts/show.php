<!--/posts/show/id-->
<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id="articles">
        <div class="single">
            <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
            <br>

            <?php if($data['post']->id_aut == $_SESSION['user_id']) : ?>
                <hr>

                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->slug; ?>" class="btn btn-dark">Edit</a>

                <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            <?php endif; ?>
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
        <?php require APPROOT . '/views/inc/footer.php'; ?>
