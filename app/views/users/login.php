<!--app/views/users/login-->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="articles">
    <div class="login">
        <div>
            <?php flash('register_success') ?>
            <h1>Login</h1>
            <p>Entrez vos identifiants s'il vous plait .....</p>
            <form id="classique" action="<?=  URLROOT ?>/users/login" method="post">
                <div class="form-group">
                    <label for="email">Email : <sup>*</sup></label>
                    <input type="email" id="email" name="email"
                           class="is-invalid <?= (!empty($data['email_err'])) ? 'is-invalid' : '';?>"
                           value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div>
                    <label for="password">Password : <sup>*</sup></label>
                    <input type="password" id="password" name="password"
                           class="is-invalid <?= (!empty($data['password_err'])) ? 'is-invalid' : '';?>"
                           value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>
                <div>
                    <div>
                        <input type="submit" value="Login" class="btn btn-success btn-clock">
                    </div>
                    <div>
                        <a href="<?= URLROOT; ?>/users/register" class="btn btn-light btn-block">No account ? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>



