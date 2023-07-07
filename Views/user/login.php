<?php require_once "Views/head.php"; ?>

<div class="container">
    <h1 style="text-align: center;">Connectez vous !</h1>
  <div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-6">
      <form class="login-form border p-4 shadow-lg" action="../user/login" method="post">
        <label for="mail_user">Email/utilisateur</label>
        <input type="email" name="mail_user" id="mail_user" class="form-control mb-3" required>

        <label for="password_user">Mot de Passe</label>
        <input type="password" name="password_user" id="password_user" class="form-control mb-3" required>

        <p id="propinscription" class="mb-3">Vous n'avez pas encore de compte ? <a href="../user/login"><span>Inscrivez-vous !</span></a></p>

        <button type="submit" class="btn btn-primary">Se connecter</button>
      </form>
    </div>
  </div>
</div>

<?php require_once "Views/foot.php"; ?>
