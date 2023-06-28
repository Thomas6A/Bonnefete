<?php require_once 'Views/head.php'; ?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Mail</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getPseudo() ?></td>
            <td><?= $user->getMail() ?></td>
            <td><a href="./updateStatut/<?= $user->getId() ?>">Modifier en modérateur</a>
                <a href="./delete/<?= $user->getId() ?>">Supprimer Profile</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>