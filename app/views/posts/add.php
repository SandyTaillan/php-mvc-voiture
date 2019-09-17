<!--app/views/posts/add.php-->
<?php require APPROOT . '/views/inc/admin-head.php'; ?>
<div id="administration">
    <div id="admin_articles" class="admin_add">
        <h1>Administration : Ajouter un article</h1>
<!--        <a class="btn dis-right" href="--><?//= URLROOT; ?><!--/posts">Revenir à l'admin principal</a>-->
        <div >
            <h2>Créer un article</h2>
            <form action="<?=  URLROOT ?>/posts/add" method='POST'>
                <div>
                    <label for="title">Titre : <sup>*</sup></label>
                    <input type="text" id="title" name="title" class="is-invalid
                    <?= (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?= $data['title']; ?>">
                    <span class="invalid-feedback"><?= $data['title_err']; ?></span>
                    <label for="slug">Permalien : <sup>*</sup></label>
                    <input type="text" id="slug" name="slug" value="">
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
                                <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="10">
                        <?= $data['body'] ; ?>
                    </textarea>
                    <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                    <br>
                    <label for="resume">Résumé de l'article :</label>
                    <textarea name="resume" id="resume" rows="5"  class="form-control form-control-lg"></textarea>
                </div>
                <input type="submit" class="btn" value="enregistrer">
                <p><sup>*</sup> Champs obligatoires</p>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
