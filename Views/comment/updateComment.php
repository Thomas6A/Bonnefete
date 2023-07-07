<?php require_once 'Views/head.php'; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <form action="../../../comment/update/<?=$comment->getId()?>/<?=$comment->getIdPost()?>" method="post">
        <div class="form-group">
          <label for="content_post">Modifier le post:</label>
          <textarea name="content_post" id="content_post" class="form-control"><?=$comment->getContent()?></textarea>
        </div>
        <button class="btn btn-primary mt-5 mb-5">Mettre à jour</button>
      </form>
    </div>
  </div>
</div>

<?php require_once 'Views/foot.php'; ?>
