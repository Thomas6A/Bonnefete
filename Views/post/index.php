<?php require_once 'Views/head.php'; ?>

<div class='row'>
    <div class='col-3 col-lg-2'></div>
    <div class='col-6 col-lg-4 card bg-light p-2'>
        <?php if (!empty($_SESSION) && $_SESSION['isModerator'] == 0 && $_SESSION['isSuperAdmin'] == 0) : ?>

            <form action=<?= "../post/create" ?> method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="content_post">Ecrivez votre Post</label>
                    <input type="textarea" name="content_post" id="content_post" class="form-control">
                    <label for="file">Fichier</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <button class="btn btn-primary w-100"><?= "Envoyer" ?></button>
            </form>
        <?php endif; ?>
    </div>

</div>
<?php foreach ($posts as $post) : ?>
    <div class='row mt-1 mb-1'>
        <div class="col-md-4"></div>
        <div class="col-md-4 card bg-light pb-2">
            <h2>Post:</h2>
            <p><?= $post->getContent() ?></p>
            <p><?= $post->getDate() ?></p>
            <?php if ($post->image_post != null) : ?>
                <img src='/bonnefete/upload/<?= $post->image_post ?>'>
            <?php endif; ?>
            <p>De : <?= $post->pseudo_user ?></p>
            <a class="btn btn-primary w-100" href="./detail/<?= $post->getId() ?>">Voir détail</a>
            <?php if ($_SESSION['pseudo_user'] == $post->pseudo_user) : ?>
                <a class="btn btn-success w-100" href="./update/<?= $post->getId() ?>">Modifier le post</a>
                <a class="btn btn-danger w-100" href="./delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php elseif ($_SESSION['isModerator'] == 1 or $_SESSION['isSuperAdmin'] == 1) : ?>
                <a class="btn btn-danger w-100" href="./delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>