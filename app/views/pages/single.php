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
                Modifié le <?= $data['post']->modified_at; ?><br>
                Nombre de commentaire : Encore à déterminer
            </p>
            <p class="single_texte">
                <?= html_entity_decode($data['post']->text_art); ?>
            </p>
        </div>
        <div class="commentaire">
            <h3>Ajouter un commentaire</h3>
            <form action="<?= URLROOT ?>/pages/single/<?= $data['slug']; ?> " method="POST">
                <label for="com_name">Votre nom ou pseudo : <sup>*</sup></label><br>
                <input type="text" id="com_name" name="com_name"><br>
                <label for="com_email">Votre email : <sup>*</sup></label><br>
                <input type="email" id="com_email" name="com_email"><br>
                <label for="com_comment">Votre commentaire <sup>*</sup></label><br>
                <textarea name="com_comment" id="com_comment" cols="30" rows="10"></textarea><br>
                <p>
                    <sup>*</sup> Champs obligatoire
                </p>
                <input type="submit" value="Validez" class="btn normal">
            </form>
            <h3>Les commentaires sur l'article</h3>
            <?php foreach ($data['usercomment'] as $comment): ?>
                <p>Commentaire de <?= $comment->com_auteur; ?> du <?= $comment->com_created; ?> :</p>
                <?php if ($comment->comment_approuv) { ?>
                    <p><?= $comment->com_contenu; ?></p>
                <?php } else { ?>
                <p>Commentaire en attente de validation.</p>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require_once APPROOT . '/views/inc/footer.php'; ?>
