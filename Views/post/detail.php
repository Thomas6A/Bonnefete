<?php require_once 'Views/head.php'; ?>

<div>
    <h1>Post de : <?= $post->pseudo_user ?></h1>
    <h2>Post:</h2>
    <p><?= $post->getContent() ?></p>
    <p><?= $post->getDate() ?></p>

</div>

<?php require_once 'Views/foot.php'; ?>