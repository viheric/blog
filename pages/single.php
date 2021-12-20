<?php

use App\App;
use App\Table\Categorie;
use App\Table\Article;


$post = Article::find($_GET['id']);
if ($post === false) {
    App::notFound();
}

//$categorie = Categorie::find($post->category_id);
$categories = Categorie::all();
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