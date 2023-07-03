<?php require_once 'Views/head.php'; ?>
<?php var_dump($likes); ?>
<div>
    <h1>Post de : <a href="../../post/list/<?= $post->pseudo_user ?>"> <?= $post->pseudo_user ?></a></h1>
    <h2>Post:</h2>
    <p><?= $post->getContent() ?></p>
    <p><?= $post->getDate() ?></p>
    <?php if ($has_like == false) : ?>
        <a href="../../like/likePost/<?= $post->getId() ?>">Like</a>
    <?php else : ?>
        <a href="../../like/delete/<?= $post->getId() ?>">Unlike</a>
    <?php endif; ?>
    <span class="like-count">nb de like :<?= $like_post[0]->nb_like ?></span>
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
        <?php if (count($likes) != 0) :?>
            <?php foreach ($likes as $like) : ?>
                <?php if ($like->getIdComment() == $comment->getId() && $like->getIdUser() == $_SESSION['id_user']) :?>
                    <a href="../../like/deleteComment/<?= $comment->getId() ?>/<?= $post->getId() ?>">Unlike</a>
                <?php elseif (($like->getIdComment() == $comment->getId()) and !($like->getIdUser() == $_SESSION['id_user'])) : ?>
                    <a href="../../like/likeComment/<?= $comment->getId() ?>/<?= $post->getId() ?>">Like</a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <a href="../../like/likeComment/<?= $comment->getId() ?>/<?= $post->getId() ?>">Like</a>
        <?php endif; ?>
        <?php foreach ($like_comments as $like_comment) : ?>
            <?php if ($like_comment->id_comment == $comment->getId()) : ?>
                <span class="like-count"><?= $like_comment->nb_like ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if ($_SESSION['pseudo_user'] == $comment->pseudo_user) : ?>
            <a href="../../comment/update/<?= $comment->getId() ?>/<?= $post->getId() ?>">Modifier le commentaire</a>
            <a href="../../comment/delete/<?= $comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
        <?php elseif ($_SESSION['isModerator'] == 1) : ?>
            <a href="../../comment/delete/<?= $comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
        <?php endif; ?>
        <?php foreach ($com_comments as $com_comment) : ?>

            <?php if ($com_comment->getIdPrecomment() == $comment->getId()) : ?>
                <h3>Réponses</h3>
                <p><?= $com_comment->getContent() ?></p>
                <p><?= $com_comment->getDate() ?></p>
                <p>de <?= $com_comment->pseudo_user ?></p>
                <?php if (count($likes) != 0) : ?>
                    <?php foreach ($likes as $like) : ?>
                        <?php if ($like->getIdComment() == $com_comment->getId() && $like->getIdUser() == $_SESSION['id_user']) : ?>
                            <a href="../../like/deleteComment/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Unlike</a>
                        <?php else : ?>
                            <a href="../../like/likeComment/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Like</a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <a href="../../like/likeComment/<?= $comment->getId() ?>/<?= $post->getId() ?>">Like</a>
                <?php endif; ?>
                <?php foreach ($like_comments as $like_comment) : ?>
                    <?php if ($like_comment->id_comment == $com_comment->getId()) : ?>
                        <span class="like-count"><?= $like_comment->nb_like ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($_SESSION['pseudo_user'] == $com_comment->pseudo_user) : ?>
                    <a href="../../comment/update/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Modifier le commentaire</a>
                    <a href="../../comment/delete/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
                <?php elseif ($_SESSION['isModerator'] == 1) : ?>
                    <a href="../../comment/delete/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
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