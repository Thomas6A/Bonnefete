<?php require_once 'Views/head.php'; ?>

<form action=<?="../../user/updatePassword/".$id_user ?> method="post">
    <div class="form-group col-12 m-5 mb-5 text-center mb-5">
        <label for="password_user" class="mb-5">Modifier Mot de passe de l'utilisateur</label>
        <input type="password" name="password_user" id="password_user" class="form-control col-6 d-flex justify-content-center w-50 m-auto border-3">
    </div>
    <button class="btn btn-primary col-3 m-auto d-flex justify-content-center mb-5 mt-5"><?="Modifier mot de passe"?></button>
</form>

<?php require_once 'Views/foot.php'; ?>