<?php require_once 'Views/head.php'; ?>

<form action=<?="../../comment/update/".$comment->getId() ?> method="post">
    <div class="form-group">
        <label for="content_post">Modifier le post:</label>
        <input type="textarea" name="content_post" id="content_post" class="form-control" value="<?=$comment->getContent()?>">
    </div>
    <button class="btn btn-primary"><?="Mettre à jour"?></button>
</form>

<?php require_once 'Views/foot.php'; ?>