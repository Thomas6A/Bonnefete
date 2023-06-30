<?php require_once 'Views/head.php'; ?>

<div>
    <h1>Post de : <a href="../../post/list/<?= $post->pseudo_user ?>"> <?= $post->pseudo_user ?></a></h1>
    <h2>Post:</h2>
    <p><?= $post->getContent() ?></p>
    <p><?= $post->getDate() ?></p>
</div>

<div>
    <h2>Commentaires :</h2>
    <?php foreach ($comments as $comment) : ?>
        <p><?= $comment->getContent() ?></p>
        <p><?= $comment->getDate() ?></p>
        <p>de <?= $comment->pseudo_user ?></p>
        <form action="../../comment/createCom/<?= $post->getId() ?>/<?= $comment->getId() ?>" method="post">
            <div class="form-group">
                <label for="content_comment">Ecrivez votre Réponse</label>
                <input type="textarea" name="content_comment" id="content_comment" class="form-control">
            </div>
            <button class="btn btn-primary"><?= "Envoyer" ?></button>
        </form>
        <?php if ($_SESSION['pseudo_user'] == $comment->pseudo_user) : ?>
            <a href="../../comment/update/<?= $comment->getId() ?>">Modifier le commentaire</a>
            <a href="../../comment/delete/<?= $comment->getId() ?>">Supprimer le commentaire</a>
        <?php elseif ($_SESSION['isModerator'] == 1) : ?>
            <a href="../../comment/delete/<?= $comment->getId() ?>">Supprimer le commentaire</a>
        <?php endif; ?>
        <?php foreach ($com_comments as $com_comment) : ?>

            <?php if ($com_comment->getIdPrecomment() == $comment->getId()) : ?>
                <h3>Réponses</h3>
                <p><?= $com_comment->getContent() ?></p>
                <p><?= $com_comment->getDate() ?></p>
                <p>de <?= $com_comment->pseudo_user ?></p>
                <?php if ($_SESSION['pseudo_user'] == $com_comment->pseudo_user) : ?>
                    <a href="../../comment/update/<?= $com_comment->getId() ?>">Modifier le commentaire</a>
                    <a href="../../comment/delete/<?= $com_comment->getId() ?>">Supprimer le commentaire</a>
                <?php elseif ($_SESSION['isModerator'] == 1) : ?>
                    <a href="../../comment/delete/<?= $com_comment->getId() ?>">Supprimer le commentaire</a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <br>
    <?php endforeach; ?>
    <?php if (!empty($_SESSION) && $_SESSION['isModerator'] == 0) : ?>
        <form action="../../comment/create/<?= $post->getId() ?>" method="post">
            <div class="form-group">
                <label for="content_comment">
                    <h3> Ecrivez votre Commentaire</h3>
                </label>
                <input type="textarea" name="content_comment" id="content_comment" class="form-control">
            </div>
            <button class="btn btn-primary"><?= "Envoyer" ?></button>
        </form>
    <?php endif; ?>
</div>

<?php require_once 'Views/foot.php'; ?>