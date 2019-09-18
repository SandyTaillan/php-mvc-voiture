<!--app/views/posts/add.php-->
<?php require APPROOT . '/views/inc/admin-head.php'; ?>
<div id="administration-single">
        <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
    <div id="admin_articles" class="admin_add">
        <h1>Administration : Ajouter un article</h1>
<!--        <a class="btn dis-right" href="--><?//= URLROOT; ?><!--/posts">Revenir à l'admin principal</a>-->
        <form action="<?= URLROOT ?>/posts/add" method='POST'>
            <div class="form-group">
                <label for="title">Titre : <sup>*</sup></label><br>
                <input class="width" type="text" id="title" name="title" class="is-invalid
                <?= (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?= $data['title']; ?>">
                <span class="invalid-feedback"><?= $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="slug">Permalien : <sup>*</sup></label><br>
                <input class="width" type="text" id="slug" name="slug" value="">
            </div>
            <br>
            <div class="float-left">
                    <label for="categorie">Catégorie : </label>
<!--                        <input class="cate_form" type="text" id="categorie" name="categorie">-->
                    <select name="categorie" id="categorie">
                        <?php foreach ($data['posts'] as $post) : ?>
                        <option value="<?= $post->name_cat; ?>"><?= $post->name_cat; ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <div class="dis-right">
                    <label for="lien_img">Image à la une :</label>
                    <input type="text" id="lien_img" name="lien_img">
            </div>
                <label class="clearboth" for="body">Body : <sup>*</sup></label>
                <textarea id="body" name="body" class="form-control form-control-lg
                            <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="30">
                    <?= $data['body'] ; ?>
                </textarea>
                <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                <br>
                <label for="resume">Résumé de l'article :</label>
                <textarea name="resume" id="resume" rows="5"  class="form-control form-control-lg"></textarea>
            <div class="form-group">
                <p><sup>*</sup> Champs obligatoires</p>
                <input type="submit" class="btn normal" value="enregistrer">

            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
