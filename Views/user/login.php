<?php require_once "Views/head.php"; ?>

<form action="../user/login" method="post" style="margin-bottom: 16%;">
    <label for="mail_user">Email/utilisateur</label>
    <input type="email" name="mail_user" id="mail_user" required>
    <label for="password_user">Mot de Passe</label>
    <input type="password" name="password_user" id="password_user" required>
    <p id="propinscription">vous n'avez pas encore de compte ? <a href="#"><span>inscrivez-vous !</span></a></p>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require_once "Views/foot.php"; ?>