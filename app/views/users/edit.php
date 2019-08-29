<!--/views/users/edit_users.php-->
<!--todo : j'ai besoin de récupérer l'id mais aussi tout le contenu de cet utilisateur-->
<!--todo: Ensuite, je lancerai la fonction pour -->
<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id="administration">
        <div id="admin_articles" class="admin_add">
            <h1>Administration : Modifier un auteur.</h1>
            <form action="<?=  URLROOT; ?>/users/edit/<?= $data['id']; ?>" method="post">
                <div class="form-group">
                    <label for="name">Nom : <sup>*</sup></label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                           value="<?= $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" id="pseudo" name="pseudo" class="form-control form-control-lg"
                           value="<?= $data['pseudo'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email : <sup>*</sup></label>
                    <input type="text" id="email" name="email"
                           class="is-invalid <?= (!empty($data['email_err'])) ? 'is-invalid' : '';?>"
                           value="<?= $data['email'] ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Pour changer votre mot de passe : </label>
                    <input type="text" id="password" name="password" class="form-control form-control-lg"
                           class="is-invalid <?= (!empty($data['password_err'])) ? 'is-invalid' : '';?>"
                           value="">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>

                </div>
                <div class="form-group">
                    <label for="avatar">Veuillez indiquer le lien vers votre avatar: </label>
                    <input type="text" id="avatar" name="avatar" class="form-control form-control-lg"
                           value="<?= $data['avatar'] ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Submit">
                <p><sup>*</sup> Champs obligatoires</p>
            </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
