<!--app/views/posts/add.php-->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="articles">
    <div class="login">
        <a class="btn" href="<?= URLROOT; ?>/posts">Back</a>
        <div>
            <h2>Ajouter un article</h2>
            <p>Créer un article</p>
            <form action="<?=  URLROOT ?>/posts/add" method='POST'>
                <div>
                    <label for="title">Titre : <sup>*</sup></label>
                    <input type="text" id="title" name="title" class="is-invalid<?= (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?= $data['title']; ?>">
                    <span class="invalid-feedback"><?= $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Body : <sup>*</sup></label>
                    <textarea id="body" name="body" class="form-control form-control-lg
                                <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?= $data['body'] ; ?>
                    </textarea>
                    <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                </div>
                <input type="submit" class="btn" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


