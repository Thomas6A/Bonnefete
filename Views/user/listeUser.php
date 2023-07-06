<?php require_once 'Views/head.php'; ?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Mail</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <?php if ($user->isSuperAdmin == 0) : ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getPseudo() ?></td>
            <td><?= $user->getMail() ?></td>
            <td><?php if ($user->isModerator == 0) : ?>
                <a href="../user/updateStatut/<?= $user->getId() ?>">Modifier en modérateur</a>
                <a href="../user/delete/<?= $user->getId() ?>">Supprimer Profile</a>
                <?php endif; ?>
                <?php if ($_SESSION['isSuperAdmin'] == 1) : ?>
                    <?php if ($user->isModerator == 1) : ?>
                        <a href="../user/updateModo/<?= $user->getId() ?>">Enlever le statut de modérateur</a>
                        <a href="../user/delete/<?= $user->getId() ?>">Supprimer Profile</a>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
                
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>