<?php var_dump($_SESSION) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bonnefete/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php if(empty($_SESSION)) : ?>


<?php else: ?>
<a href="../user/logout">Se Deconnecter</a>
<a href="../user/update/<?= $_SESSION['id_user'] ?>">Modifier Profile</a>
<?php if($_SESSION['isModerator'] == 1) : ?>
<a href="../user/list">Liste des Utilisateurs</a>
<?php endif; ?>
<?php endif; ?>


<nav class="navbar navbar-expand-lg bg-body-dark" style = "background-color: rgba(0, 0, 0);">
    <img src="../Views/BONNE-removebg-preview.png" alt="" style="margin-left: 750px; width: 250px">
    <div class="connect_box"> 
   
   <form>
      <p>
         
         <input type="password" value="" placeholder="Mot de passe" style="width: 250px; height:40px" id="password" >
         
      </p>
   </form>
</div>
  <div class="container-fluid" style="margin-left: 200px;">
  <button type="button"  class="btn btn-primary">Connexion<a href="../user/login"></button></a>
  <button type="button" class="btn btn-success" style=" margin-right: 200px;" >Inscription<a href="../user/register" ></button></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
  </div>
</nav>