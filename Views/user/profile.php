<?php require_once 'Views/head.php'; ?>

<div class="container">
    <h1 class="text-center">Modifier mon profil</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form action=<?= "../../user/update/" . $id_user ?> method="post" class="border border-dark shadow p-4 mt-5 mb-5">
                <div class="form-group">
                    <label for="pseudo_user">Pseudo de l'utilisateur</label>
                    <input type="text" name="pseudo_user" id="pseudo_user" class="form-control" value="<?= $user->getPseudo() ?>">
                </div>
                <div class="form-group">
                    <label for="mail_user">Mail de l'utilisateur</label>
                    <input type="text" name="mail_user" id="mail_user" class="form-control" value="<?= $user->getMail() ?>">
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary">Mettre à jour</button>
                    <button class="btn btn-success">
                        Modifier Mot de passe<a href="../updatePassword/<?= $id_user ?>" class="mx-3"></a>
                    </button>
                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-danger">Supprimer profil <a href="../delete/<?= $id_user ?>"></a></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'Views/foot.php'; ?>
