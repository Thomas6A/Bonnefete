<?php
require_once 'Views/head.php'; ?>

<form action="../user/register" method="post">
    <label for="mail_user">Email</label>
    <input type="email" name="mail_user" id="mail_user" required>
    <label for="password_user">Mot de passe</label>
    <input type="password" name="password_user" id="password_user" required>
    <label for="pseudo_user">Pseudo</label>
    <input type="text" name="pseudo_user" id="pseudo_user" required>
    <p>Vous avez deja un compte? <a href=""><span>Connectez vous !</span></a></p>
    <button type="submit" class="btn btn-success">s'inscrire</button>
</form>

<?php require_once 'Views/foot.php'; ?>