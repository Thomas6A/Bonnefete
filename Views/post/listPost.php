<?php require_once 'Views/head.php'; ?>

<h1>Liste des posts de <?= $pseudo_user ?></h1>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Contenu</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->getId() ?></td>
            <td><?= $post->getContent() ?></td>
            <td><?= $post->getDate() ?></td>
            <td><a href="../detail/<?= $post->getId() ?>">Voir détail</a>
            <?php if($_SESSION['pseudo_user'] == $post->pseudo_user) : ?>
                <a href="../update/<?= $post->getId() ?>">Modifier le post</a>
                <a href="../delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php elseif($_SESSION['isModerator'] == 1): ?>
                <a href="../delete/<?= $post->getId() ?>">Supprimer le post</a>
            <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>