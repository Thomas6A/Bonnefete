<?php require_once 'Views/head.php'; ?>

<form action=<?="../../user/updatePassword/".$id_user ?> method="post">
    <div class="form-group">
        <label for="password_user">Modifier Mot de passe de l'utilisateur</label>
        <input type="password" name="password_user" id="password_user" class="form-control">
    </div>
    <button class="btn btn-primary"><?="Modifier mot de passe"?></button>
</form>

<?php require_once 'Views/foot.php'; ?>