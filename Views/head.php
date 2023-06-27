<?php var_dump($_SESSION) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/courscrud/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php if(empty($_SESSION)) : ?>
<a href="../user/login">Se Connecter</a>
<?php else: ?>
<a href="../user/logout">Se Deconnecter</a>
<a href="./update/<?= $_SESSION['id_user'] ?>">Modifier Profile</a>
<?php endif; ?>