
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bonnefete/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bonnefete/style.css">
    <title>Document</title>
</head>
<body>
  

<nav class="navbar navbar-expand-lg bg-body-dark " style = "background-color: rgba(0, 0, 0);">
    <img src="/bonnefete/Views/BONNE__1_-removebg-preview.png" alt="" style="margin-left: 750px; width: 250px">
    <div class="connect_box"> 
</div>

  <div class="container-fluid" style="margin-left: 200px;">
  <?php if(empty($_SESSION)) : ?>
<a class="btn btn-primary" href="/bonnefete/user/login">Connexion</a>
  <a class="btn btn-success" style=" margin-right: 200px;" href="/bonnefete/user/register" >Inscription</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
<?php else: ?>
<a class="btn btn-success" href="/bonnefete/user/logout">Se Deconnecter</a>
<a class="btn btn-primary" href="/bonnefete/user/update/<?= $_SESSION['id_user'] ?>">Modifier Profile</a>
<a class="btn btn-success" href="/bonnefete/post/index">Accueil</a>
<?php if($_SESSION['isModerator'] == 1 or $_SESSION['isSuperAdmin'] == 1) : ?>
<a href="../user/list">Liste des Utilisateurs</a>

<?php endif; ?>
<?php endif; ?>
  </div>
</nav>
<div class="sidebar position-absolute h-100 d-flex flex-column p-5 bg-black" style="width: 16%;" >
        
        <a class="accueil mt-5 text-decoration-none text-white" href="/bonnefete/">Accueil</a>
        <a class="mon-profil mt-5 text-decoration-none text-white " href="/bonnefete/user/update">Mon Profil</a>
        <a class="btn btn-danger mt-5 w-75 rounded-4" href="/bonnefete/user/logout">Se Déconnecter</a>
       
    </div>