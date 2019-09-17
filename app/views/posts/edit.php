<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="administration">
    <div id="admin_articles" class="admin_add">
        <h1>Administration : Modifier un article</h1>
        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
        <br>
        <form action="<?=  URLROOT; ?>/posts/edit/<?= $data['id']; ?>" method="post">
            <div class="form-group">
                <label for="title">Title : <sup>*</sup></label>
                <input type="text" id="title" name="title" class="form-control form-control-lg
                        <?= (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?= $data['title']; ?>">
                <span class="invalid-feedback"><?= $data['title_err']; ?></span>
            </div>
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
            <div class="form-group clearboth">
                <label for="body">Body : <sup>*</sup></label>
                <textarea id="body" name="body" class="form-control form-control-lg
                        <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="10">
                    <?= html_entity_decode($data['body']) ; ?>
                </textarea>
                <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                <label for="resume">Résumé de l'article :</label>
                <textarea name="resume" id="resume" rows="2"  class="form-control form-control-lg">
                    <?= $data['resume'] ; ?>
                </textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
