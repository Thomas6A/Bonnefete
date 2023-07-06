<?php require_once 'Views/head.php'; ?>
<div class='row mt-2'>
    <div class="col-md-4"></div>
    <div class="col-md-4 card bg-light">
        <h1>Post de : <a href="../../post/list/<?= $post->pseudo_user ?>"> <?= $post->pseudo_user ?></a></h1>
        <h2>Post:</h2>
        <p><?= $post->getContent() ?></p>
        <p><?= $post->getDate() ?></p>
        <?php if ($post->image_post != null) : ?>
            <img src='/bonnefete/upload/<?= $post->image_post ?>'>
        <?php endif; ?>
        <?php if ($has_like == false) : ?>
            <a href="../../like/likePost/<?= $post->getId() ?>"><img src="/bonnefete/Views/Like.png" alt=""></a>
        <?php else : ?>
            <a href="../../like/delete/<?= $post->getId() ?>"><img src="/bonnefete/Views/Unlike.png" alt=""></a>
        <?php endif; ?>
        <span class="like-count">nb de like :<?= $like_post[0]->nb_like ?></span>
    </div>
</div>
<div class='row mt-2'>
    <div class="col-md-4"></div>
    <div class='col-md-4 card bg-light p-2'>
        <?php if (!empty($_SESSION) && $_SESSION['isModerator'] == 0 && $_SESSION['isSuperAdmin'] == 0) : ?>
            <form action="../../comment/create/<?= $post->getId() ?>" method="post" class='mt-2 w-100'>
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
</div>
<div class='row mb-2'>
    <div class="col-md-3"></div>
    <div class="col-md-8">
        <h2>Commentaires :</h2>
        <div class='row'>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <?php foreach ($comments as $comment) : ?>
                    <div class="card bg-light p-2">
                        <p><?= $comment->getContent() ?></p>
                        <p><?= $comment->getDate() ?></p>
                        <p>de <?= $comment->pseudo_user ?></p>
                        <?php if (count($likes) != 0) : ?>
                            <?php $hasLikedComment = false; ?>
                            <?php foreach ($likes as $like) : ?>
                                <?php if ($like->getIdComment() == $comment->getId() && $like->getIdUser() == $_SESSION['id_user']) : ?>
                                    <?php $hasLikedComment = true; ?>
                                    <a href="../../like/deleteComment/<?= $comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Unlike.png" alt=""></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$hasLikedComment) : ?>
                                <a href="../../like/likeComment/<?= $comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Like.png" alt=""></a>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="../../like/likeComment/<?= $comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Like.png" alt=""></a>
                        <?php endif; ?>
                        <?php foreach ($like_comments as $like_comment) : ?>
                            <?php if ($like_comment->id_comment == $comment->getId()) : ?>
                                <span class="like-count"><?= $like_comment->nb_like ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($_SESSION['pseudo_user'] == $comment->pseudo_user) : ?>
                            <a href="../../comment/update/<?= $comment->getId() ?>/<?= $post->getId() ?>">Modifier le commentaire</a>
                            <a href="../../comment/delete/<?= $comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
                        <?php elseif ($_SESSION['isModerator'] == 1 or $_SESSION['isSuperAdmin'] == 1) : ?>
                            <a href="../../comment/delete/<?= $comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
                        <?php endif; ?>
                        <form action="../../comment/createCom/<?= $post->getId() ?>/<?= $comment->getId() ?>" method="post" class='w-100'>
                            <div class="form-group">
                                <label for="content_comment">Ecrivez votre Réponse</label>
                                <input type="textarea" name="content_comment" id="content_comment" class="form-control">
                            </div>
                            <button class="btn btn-primary"><?= "Envoyer" ?></button>
                        </form>
                        <?php foreach ($com_comments as $com_comment) : ?>

                            <?php if ($com_comment->getIdPrecomment() == $comment->getId()) : ?>
                                <h3>Réponses</h3>
                                <p><?= $com_comment->getContent() ?></p>
                                <p><?= $com_comment->getDate() ?></p>
                                <p>de <?= $com_comment->pseudo_user ?></p>
                                <?php if (count($likes) != 0) : ?>
                                    <?php $hasLikedComment = false; ?>
                                    <?php foreach ($likes as $like) : ?>
                                        <?php if ($like->getIdComment() == $com_comment->getId() && $like->getIdUser() == $_SESSION['id_user']) : ?>
                                            <?php $hasLikedComment = true; ?>
                                            <a href="../../like/deleteComment/<?= $com_comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Unlike.png" alt=""></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if (!$hasLikedComment) : ?>
                                        <a href="../../like/likeComment/<?= $com_comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Like.png" alt=""></a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a href="../../like/likeComment/<?= $com_comment->getId() ?>/<?= $post->getId() ?>"><img src="/bonnefete/Views/Like.png" alt=""></a>
                                <?php endif; ?>
                                <?php foreach ($like_comments as $like_comment) : ?>
                                    <?php if ($like_comment->id_comment == $com_comment->getId()) : ?>
                                        <span class="like-count"><?= $like_comment->nb_like ?></span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($_SESSION['pseudo_user'] == $com_comment->pseudo_user) : ?>
                                    <a href="../../comment/update/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Modifier le commentaire</a>
                                    <a href="../../comment/delete/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
                                <?php elseif ($_SESSION['isModerator'] == 1 or $_SESSION['isSuperAdmin'] == 1) : ?>
                                    <a href="../../comment/delete/<?= $com_comment->getId() ?>/<?= $post->getId() ?>">Supprimer le commentaire</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once 'Views/foot.php'; ?>