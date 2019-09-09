<!--/views/posts/index.php-->
    <?php
        require APPROOT . '/views/inc/header.php';
        flash('post_message'); ?>
    <div id="administration">
        <?php require APPROOT . '/views/posts/inc/navbar.php'; ?>
        <div id="admin_articles">
            <h1>Administration</h1>
                <div class="col-md-6">
                    <a href="<?= URLROOT ?>/posts/add" class="btn btn-primary pull-right">
                        <i class="fa fa-pencil">Ajouter un  article</i>
                    </a>
                </div>
            <table>
                <thead>
                    <tr>
                        <th>Articles</th>
                        <th>Catégories</th>
                        <th>Image à la une</th>
                        <th>Résumé</th>
                        <th>Date de création</th>
                        <th>Dern. modif.</th>
                        <th>Auteur</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['posts'] as $post) : ?>
                    <tr>
                        <td class="col-gm"><a href="<?= URLROOT ?>/posts/show/<?= $post->id; ?>"><?= $post->title; ?></a></td>
                        <td class="col-mm"><?= $post->name_cate; ?></td>
                        <td class="col-pm"><img src="<?= $post->lien_img; ?>" alt="" width="150px"></td>
                        <td class="col-gm"><?= $post->resume; ?></td>
                        <td class="col-pm-date"><?= $post->date_crea; ?></td>
                        <td class="col-pm-date"><?= $post->modified_at; ?></td>
                        <td class="col-mm"><?= $post->name_aut; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        <!--    </div>-->
        <!--    --><?php //foreach($data['posts'] as $post) : ?>
        <!--        <div class="card card-body mb-3">-->
        <!--            <h4 class="card-title">--><?php //echo $post->titre1; ?><!--</h4>-->
        <!--            <div class="bg-light p-2 mb-3">-->
        <!--                written by --><?//= $post->name; ?><!-- on --><?//= $post->date_creation; ?>
        <!--            </div>-->
        <!--            <p class="card-text">--><?//= $post->resume; ?><!--</p>-->
        <!--            <a href="--><?//= URLROOT; ?><!--/posts/show/--><?//= $post->postId; ?><!--" class="btn btn-dark">More</a>-->
        <!--        </div>-->
        <!--    --><?php //endforeach; ?>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
