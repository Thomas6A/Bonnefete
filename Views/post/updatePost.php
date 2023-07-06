<?php require_once 'Views/head.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Modifier le post</h3>
                <form action="<?="../../post/update/".$post->getId() ?>" method="post">
                    <div class="form-group m-5">
                        <label for="content_post mt-5">Contenu du post:</label>
                        <textarea name="content_post" id="content_post" class="form-control" rows="6"><?=$post->getContent()?></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary mb-5 mt-5">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'Views/foot.php'; ?>
