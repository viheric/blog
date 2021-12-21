<?php

$app = App::getInstance();

$post = $app->getTable('article')->find($_GET['id']);
if($post === false) {
    $app->notFound();
}

//$categorie = Categorie::find($post->category_id);
$categories = $app->getTable('categorie')->all();
?>



<div class="row align-items-start">
    <div class="col-8">

        <h1><?= $post->titre; ?></h1>
        <p><em><?= $post->categorie ?></em></p>
        <p><?= $post->contenu ?></p>

    </div>

    <div class="col-4">
        <ul>
            <?php foreach ($categories as $cat) : ?>
                <li>
                    <a href='<?= $cat->url ?>'><?= $cat->titre ?></a>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>