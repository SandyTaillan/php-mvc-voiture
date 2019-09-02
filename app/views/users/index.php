<!--/views/posts/users.php-->
<?php
require APPROOT . '/views/inc/header.php';
flash('post_message'); ?>
<div id="administration">
    <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
    <div id="admin_articles">
        <h1>Administration</h1>
        <div>
            <a href="<?= URLROOT ?>/users/register" class="btn btn-primary pull-right">
                <i class="fa fa-pencil">Ajouter un auteur</i>
            </a>
            <a href="<?= URLROOT ?>/users/edit_users" class="btn btn-primary pull-right">
                <i class="fa fa-pencil">Modifier un auteur</i>
            </a>
            <a href="<?= URLROOT ?>/users/register" class="btn btn-primary pull-right">
                <i class="fa fa-pencil">Supprimer un auteur</i>
            </a>
        </div>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Pseudo</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Date d'arrivée</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['posts'] as $post) : ?>
                <tr>
                    <td class="col-gm"><a href="<?= URLROOT ?>/users/edit/<?= $post->id_aut; ?>"><?= $post->name_aut; ?></a></td>
                    <td class="col-mm"><?= $post->pseudo_aut; ?></td>
                    <td class="col-pm"><img src="<?= URLROOT ?>/public/img/avatar/<?= $post->avatar_aut ?>" alt="" width="150px"></td>
                    <td class="col-gm"><?= $post->email; ?></td>
                    <td class="col-pm-date"><?= $post->date_crea; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
