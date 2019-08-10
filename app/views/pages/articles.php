<!--app/views/pages/articles-->
<?php
    require_once APPROOT . '/views/inc/head.php';
    require_once APPROOT . '/views/inc/header.php';
?>
    <div id="articles">
        <h1><?php echo $data['title']; ?></h1>
        <nav>
            <?php foreach($data['posts'] as $post) :?>
                <div class="articles-bloc-articles">
                    <a href=""><img src="<?= $post->lien_img ; ?>" width='300px' alt=""></a>
                    <div class="art-bloc">
                        <h2><?= $post->titre1 ; ?></h2>
                        <p class="postdata">
                            Article de <?= $post->name ; ?> créé le <?= $post->date_crea; ?>
                            dans la catégorie "<?= $post->categorie ;?>"
                        </p>
                        <p>
                            <?= $post->resume; ?>
                        </p>
                        <a href="<?= URLROOT ?>/pages/single/<?= $post->id; ?>" class="more">Lire la suite ...</a>
                    </div>

                </div>
            <?php endforeach; ?>
        </nav>
    </div>
 <?php require_once APPROOT . '/views/inc/footer.php'; ?>
