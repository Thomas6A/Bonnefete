<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (!empty($_SESSION)) : ?>
            <li class="nav-item ">
              <a class="nav-link active text-light" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" href="#">les derniers Posts</a>
            </li>
          <?php endif; ?>
        </ul>
        <form class="d-flex justify-content-between" role="search">
          <div class="d-flex align-items-center">
            <img style="width: 6%;" src="logo.png" alt="">
          </div>
          <?php if (empty($_SESSION)) : ?>
            <a class="btn btn-outline-success" href="/bonnefete/user/login">connexion</a>
            <a class="btn btn-primary" href="/bonnefete/user/register">inscriptions</a>
          <?php else : ?>
            <a class="btn btn-success" href="/bonnefete/user/logout">Se Deconnecter</a>
            <a class="btn btn-primary" href="/bonnefete/user/update/<?= $_SESSION['id_user'] ?>">Modifier Profile</a>
            <?php if ($_SESSION['isModerator'] == 1 or $_SESSION['isSuperAdmin'] == 1) : ?>
              <a href="../user/list">Liste des Utilisateurs</a>
            <?php endif; ?>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid h-100 position-absolute w-25">
    <div class="row h-100">
      <nav class="col-6 bg-black h-100">
        <div class="d-flex flex-column align-items-center h-100">
          <div class="nav flex-column mt-3">
            <a class="nav-link text-white" href="#">Accueil</a>
            <a class="nav-link text-white" href="#">Mes Posts</a>
            <a class="nav-link text-white" href="#">Modifier mon profil</a>
            <button class="btn btn-outline-danger mt-5">Déconnexion</button>
          </div>

        </div>
      </nav>
    </div>

  </div>