<?php require APPROOT . '/views/inc/admin-head.php'; ?>
<div id="administration-single">
    <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
    <div id="admin_articles" class="admin_add">
        <h1>Administration : Modifier un article</h1>
        <form action="<?=  URLROOT; ?>/posts/edit/<?= $data['id']; ?>" method="post">
            <div class="form-group">
                <label for="title">Title : <sup>*</sup></label><br>
                <input class="width type="text" id="title" name="title" class="form-control form-control-lg
                        <?= (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?= $data['title']; ?>">
                <span class="invalid-feedback"><?= $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="slug">Permalien : <sup>*</sup></label>
                <input  class="width" type="text" id="slug" name="slug" value="<?= $data['slug'] ; ?>">
            </div>
            <br>
            <div class="float-left">
                <label for="categorie">Catégorie : </label>
<!--                <input class="cate_form" type="text" id="categorie" name="categorie" value="--><?//= $data['categorie'] ;?><!--">-->
                <select name="categorie" id="categorie">
                    <option value="<?= $data['categorie']; ?>" selected><?= $data['categorie'] ; ?></option>
                    <?php foreach ($data['posts_cat'] as $post_cat) : ?>
                        <option value="<?= $post_cat->name_cat; ?>"><?= $post_cat->name_cat; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="dis-right">
                <label for="lien_img">Image à la une :</label>
                <input type="text" id="lien_img" name="lien_img" value="<?= $data['lien_img'] ;?>">
            </div>

                <label class="clearboth" for="body">Body : <sup>*</sup></label>
                <textarea id="body" name="body" class="form-control form-control-lg
                        <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="40">
                    <?= html_entity_decode($data['body']) ; ?>
                </textarea>
                <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                <br>
                <label for="resume">Résumé de l'article :</label>
                <textarea name="resume" id="resume" rows="2"  class="form-control form-control-lg">
                    <?= $data['resume'] ; ?>
                </textarea>

            <div class="form-group">
                <input type="submit" class="btn normal" value="Enregistrer">
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
