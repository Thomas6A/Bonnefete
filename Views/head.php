<?php var_dump($_SESSION) ?>
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
<?php if(empty($_SESSION)) : ?>
<a href="../user/login">Se Connecter</a>
<a href="../user/register">Créer un compte</a>
<?php else: ?>
<a href="../user/logout">Se Deconnecter</a>
<a href="../user/update/<?= $_SESSION['id_user'] ?>">Modifier Profile</a>
<?php if($_SESSION['isModerator'] == 1) : ?>
<a href="../user/list">Liste des Utilisateurs</a>
<?php endif; ?>
<?php endif; ?>