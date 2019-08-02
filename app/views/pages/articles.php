<!--app/views/pages/articles-->
<?php
    require_once APPROOT . '/views/inc/head.php';
    require_once APPROOT . '/views/inc/header.php';
?>
    <div id="articles">
        <h1><?php echo $data['title']; ?></h1>
        <nav>
            <?php foreach($data['posts'] as $post) :?>
                <a href=""><img src="<?= $post->lien_img ; ?>" width='300px' alt=""></a>
                <h2><?= $post->titre1 ; ?></h2>
                <p>
                    Article de <?= $post->name ; ?> créé le <?= $post->date_creation; ?>
                    dans la catégorie "<?= $post->categorie ;?>"
                </p>
                <p>
                    <?= $post->resume; ?>
                </p>
                <a href="<? URLROOT; ?>/posts/show/<?= $post->id; ?>" class="btn btn-bleu">More</a>
            <?php endforeach; ?>
        </nav>
    </div>
 <?php require_once APPROOT . '/views/inc/footer.php'; ?>
