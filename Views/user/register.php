<?php require_once 'Views/head.php'; ?>

<div class="container mt-5 mb-5" style="max-width: 30%">
    <h1 class="text-center">Inscription</h1>
    <form action="../user/register" method="post" class="border border-dark shadow-lg p-4 mx-auto">
        <div class="form-group">
            <label for="mail_user">Email</label>
            <input type="email" name="mail_user" id="mail_user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_user">Mot de passe</label>
            <input type="password" name="password_user" id="password_user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pseudo_user">Pseudo</label>
            <input type="text" name="pseudo_user" id="pseudo_user" class="form-control" required>
        </div>
        <p>Vous avez déjà un compte ? <a href="../user/login"><span>Connectez-vous !</span></a></p>
        <p>En vous inscrivant, vous acceptez les <a href="../user/rgpd">conditions d'utilisation</a></p>
        <button type="submit" class="btn btn-success">S'inscrire</button>
    </form>
</div>

<?php require_once 'Views/foot.php'; ?>
