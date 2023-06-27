<?php require_once "Views/head.php"; ?>

<form action="../user/login" method="post">
    <label for="mail_user">Email</label>
    <input type="email" name="mail_user" id="mail_user" required>
    <label for="password_user">Mot de Passe</label>
    <input type="password" name="password_user" id="password_user" required>
    <button>Se Connecter</button>
</form>

<?php require_once "Views/foot.php"; ?>