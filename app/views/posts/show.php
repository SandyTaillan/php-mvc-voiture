<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id="articles">
        <div class="single">
            <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
            <br>
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
            <?= var_dump($data['post']);?><br><br>
            <?= var_dump($_SESSION); ?>

            <?php if($data['post']->name == $_SESSION['user_id']) : ?>
                <hr>
                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

                <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            <?php endif; ?>
    </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
