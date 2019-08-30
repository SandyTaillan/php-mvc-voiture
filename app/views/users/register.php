<!--app/views/users/register    -->
<?php require APPROOT . '/views/inc/head.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id="articles">
        <div class="login">
            <h1>Administration : Création d'un compte</h1>
            <?= var_dump($data) ?>
            <form action="<?=  URLROOT ?>/users/register" method="post">

                <label for="name">Name : <sup>*</sup></label><br>
                <input type="text" id="name" name="name" class="form-control form-control-lg is-invalid
                  <?= (!empty($data['name_err'])) ? 'is-invalid' : '';?>" value="<?= $data['name']; ?>">
                    <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                <label for="pseudo">Votre pseudo sur le site</label><br>
                <input type="text" id="pseudo" name="pseudo">
                <label for="email">Email : <sup>*</sup></label><br>
                <input type="email" id="email" name="email" class="form-control form-control-lg is-invalid
                    <?= (!empty($data['email_err'])) ? 'is-invalid' : '';?>" value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                <label for="password">Password : <sup>*</sup></label><br>
                <input type="password" id="password" name="password" class="form-control form-control-lg is-invalid
                    <?= (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                <label for="confirm_password">Confirm password : <sup>*</sup></label><br>
                <input type="password" id="confirm_password" name="confirm_password"
                       class="form-control form-control-lg is-invalid
                    <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';?>"
                       value="<?= $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                <label for="avatar">Lien vers l'image d'avatar</label><br>
                <input type="text" id="avatar" name="avatar">

                <input type="submit" value="Register" class="btn btn-success btn-clock">
<!--                <a href="--><?//= URLROOT; ?><!--/users/login" class="btn btn-light btn-block">Have an account ? Login</a>-->
            </form>

        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

