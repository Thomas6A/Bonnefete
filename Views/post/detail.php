<?php require_once 'Views/head.php'; ?>

<div>
    <h1>Post de : <a href="../../post/list/<?= $post->pseudo_user ?>"> <?= $post->pseudo_user ?></a></h1>
    <h2>Post:</h2>
    <p><?= $post->getContent() ?></p>
    <p><?= $post->getDate() ?></p>

</div>

<?php require_once 'Views/foot.php'; ?>