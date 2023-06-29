<?php require_once 'Views/head.php'; ?>

<?php if(!empty($_SESSION) && $_SESSION['isModerator'] == 0) : ?>
    
    <form action=<?="../post/create"?> method="post">
        <div class="form-group">
            <label for="content_post">Ecrivez votre Post</label>
            <input type="textarea" name="content_post" id="content_post" class="form-control">
        </div>
        <button class="btn btn-primary"><?="Envoyer"?></button>
    </form>
<?php endif; ?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Content</th>
        <th>Date</th>
        <th>User</th>
        <th>Action</th>
    </tr>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->getId() ?></td>
            <td><?= $post->getContent() ?></td>
            <td><?= $post->getDate() ?></td>
            <td><?= $post->pseudo_user ?></td>
            <td><a href="./detail/<?= $post->getId() ?>">Voir détail</a>
            <?php if($_SESSION['pseudo_user'] == $post->pseudo_user) : ?>
                <a href="./update/<?= $post->getId() ?>">Modifier le post</a>
                <a href="./delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php elseif($_SESSION['isModerator'] == 1): ?>
                <a href="./delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>