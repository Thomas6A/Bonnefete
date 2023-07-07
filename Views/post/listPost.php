<?php require_once 'Views/head.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Liste des posts de <?= $pseudo_user ?></h1>
            <table class="table table-bordered">
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
                        <td>
                            <a href="../detail/<?= $post->getId() ?>" class="btn btn-success">Voir détail</a>
                            <?php if($_SESSION['pseudo_user'] == $post->pseudo_user) : ?>
                                <a href="../update/<?= $post->getId() ?>" class="btn btn-primary">Modifier le post</a>
                                <a href="../delete/<?= $post->getId() ?>" class="btn btn-danger">Supprimer le post</a>
                            <?php elseif($_SESSION['isModerator'] == 1): ?>
                                <a href="../delete/<?= $post->getId() ?>" class="btn btn-danger">Supprimer le post</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php require_once 'Views/foot.php'; ?>
