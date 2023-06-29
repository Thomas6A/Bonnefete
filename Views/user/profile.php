<?php require_once 'Views/head.php'; ?>

<form action=<?="../../user/update/".$id_user ?> method="post">
    <div class="form-group">
        <label for="pseudo_user">Pseudo de l'utilisateur</label>
        <input type="text" name="pseudo_user" id="pseudo_user" class="form-control" value="<?=$user->getPseudo()?>">
        <label for="mail_user">Mail de l'utilisateur</label>
        <input type="text" name="mail_user" id="mail_user" class="form-control" value="<?=$user->getMail()?>">
    </div>
    <button class="btn btn-primary"><?="Mettre à jour"?></button>
</form>
<a href="../updatePassword/<?= $id_user ?>">Modifier Mot de passe</a>
<a href="../delete/<?= $id_user ?>">Supprimer Profile</a>

<?php require_once 'Views/foot.php'; ?>