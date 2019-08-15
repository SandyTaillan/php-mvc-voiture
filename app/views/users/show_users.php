<!--/views/posts/users.php-->
<?php
require APPROOT . '/views/inc/header.php';
flash('post_message'); ?>
<div id="administration">
    <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
    <div id="admin_articles">
        <h1>Administration</h1>
        <div class="col-md-6">
            <a href="<?= URLROOT ?>/posts/adduser" class="btn btn-primary pull-right">
                <i class="fa fa-pencil">Ajouter un auteur</i>
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
                    <td class="col-gm"><a href="<?= URLROOT ?>/posts/show/<?= $post->id; ?>"><?= $post->name; ?></a></td>
                    <td class="col-mm"><?= $post->pseudo; ?></td>
                    <td class="col-pm"><img src="<?= $post->avatar ?>" alt="" width="150px"></td>
                    <td class="col-gm"><?= $post->email; ?></td>
                    <td class="col-pm-date"><?= $post->date_crea; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
